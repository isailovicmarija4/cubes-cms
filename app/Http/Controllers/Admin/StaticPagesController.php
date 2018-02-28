<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\StaticPage;

class StaticPagesController extends Controller
{
	public function index($parentId = 0) {
		
		$staticPages = StaticPage::where('parent_id', '=', $parentId)->orderBy('order_number', 'asc')->get();
		$parentPage = null;
                if($parentId != 0){
                    $parentPage = StaticPage::findOrFail($parentId);
                }
		return view('admin.static-pages.index', [
			'staticPages' => $staticPages,
                    'parentPage'=>$parentPage
		]);
	}
	
	public function add($parentId = 0) {
            $parentPage = null;
                if($parentId != 0){
                    $parentPage = StaticPage::findOrFail($parentId);
                }
		
		return view('admin.static-pages.add',[
                    'parentPage'=>$parentPage
                ]);
	}
	
	public function insert($parentId = 0) {
		$parentPage = null;
                if($parentId != 0){
                    $parentPage = StaticPage::findOrFail($parentId);
                }
		$request = request();
		
		$formData = $request->validate([
			'short_title' => 'required',
			'title' => 'required',
			'description' => 'present',
			'body' => 'present',
			'page_photo_file' => 'image|mimes:jpeg|max:10240|dimensions:min_width=100,min_height=100',
		]);
                $formData['parent_id']=$parentPage;
		
		$staticPage = new StaticPage($formData);
		
		$staticPage->order_number = StaticPage::where('parent_id','=',$parentId)->count() + 1;
		
		$staticPage->save();
		
		if ($request->hasFile('page_photo_file')) {
			// file has been uploaded
			
			$uploadedFile = $request->file('page_photo_file');
			
			$newFileName = $staticPage->id . '_' . $uploadedFile->getClientOriginalName();
			
			//move file to new location with new name
			
			$uploadedFile->storeAs('/static-pages', $newFileName, 'public');
			
			$staticPage->photo_filename = $newFileName;
			$staticPage->save();
		}
		
		return redirect()->route('admin.static-pages.index',[
                    'parentId'=>$parentId
                ])
		->with('systemMessage', 'Static page has been added!');		
	}
	
	public function edit($id) {
		
		$staticPage = StaticPage::findOrFail($id);
		$parentPage=$staticPage->parentPage;
		
		return view('admin.static-pages.edit', [
			'staticPage' => $staticPage
		]);
	}
	
	public function update($id) {
		
		$staticPage = StaticPage::findOrFail($id);
		
		$request = request();
		
		$formData = $request->validate([
			'short_title' => 'required',
			'title' => 'required',
			'description' => 'present',
			'body' => 'present',
			'page_photo_file' => 'image|mimes:jpeg|max:10240|dimensions:min_width=100,min_height=100',
		]);
		
		$staticPage->fill($formData);
		
		$staticPage->save();
		
		if ($request->hasFile('page_photo_file')) {
			
			// new uploaded file
			$uploadedFile = $request->file('page_photo_file');
			
			$publicStorage = \Storage::disk('public');
			
			//if old photo file exists delete old file
			if ($staticPage->photo_filename && $publicStorage->exists('/static-pages/' . $staticPage->photo_filename)) {
				
				$publicStorage->delete('/static-pages/' . $staticPage->photo_filename);
			}
			
			//move new file to new location
			
			$newFileName = $staticPage->id . '_' . $uploadedFile->getClientOriginalName();
			
			$uploadedFile->storeAs('/static-pages', $newFileName, 'public');
			
			//update new file name in database
			$staticPage->photo_filename = $newFileName;
			$staticPage->save();
		}
		
		
		return redirect()->route('admin.static-pages.index',[
                    'parentId'=>$staticPage->parent_id
                ])
		->with('systemMessage', 'Static page has been saved');		
	}
	
	public function delete() {
		
		$request = request();
		
		$staticPage = StaticPage::findOrFail($request->input('id'));
		
		
		//delete from database
		$staticPage->delete();
		
		StaticPage::where('order_number', '>', $staticPage->order_number)
                        ->where('parent_id','=',$staticPage->parent_id)
				->decrement('order_number');
		
		//see if photo file exists
		if (
			$staticPage->photo_filename 
			&& \Storage::disk('public')
				->exists('/static-pages/' . $staticPage->photo_filename)
		) {
			
			//delete photo from disk
			\Storage::disk('public')
				->delete('/static-pages/' . $staticPage->photo_filename);
		}
		
		return redirect()->route('admin.static-pages.index')
				->with('systemMessage', 'Static page has been deleted');
	}
	
	public function enable() {
		$request = request();
		
		$staticPage = StaticPage::findOrFail($request->input('id'));
		
		$staticPage->status = StaticPage::STATUS_ENABLED;
		
		$staticPage->save();
                return redirect()->back();
		
		return redirect()->route('admin.static-pages.index',['parentId'=>$staticPage->parent_id])
				->with('systemMessage', 'Static page has been enabled');
	}
	
	public function disable() {
		$request = request();
		
		$staticPage = StaticPage::findOrFail($request->input('id'));
		
		$staticPage->status = StaticPage::STATUS_DISABLED;
		
		$staticPage->save();
		
		return redirect()->route('admin.static-pages.index',['parentId'=>$staticPage->parent_id])
				->with('systemMessage', 'Static page has been enabled');
	}
	
	public function reorder() {
		
		$request = request();
		
		$orderIds = $request->input('order_ids');
		
		$ids = explode(',', $orderIds);
		
		foreach ($ids as $key => $id) {
			$staticPage = StaticPage::findOrFail($id);
			
			$staticPage->order_number = $key + 1;
			
			$staticPage->save();
		}
		
		return redirect()->back()
				->with('systemMessage', 'Static pages have been reordered');
	}
}
