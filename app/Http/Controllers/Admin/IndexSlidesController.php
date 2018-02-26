<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\IndexSlide;

class IndexSlidesController extends Controller
{
	public function index() {
		
		$indexSlides = IndexSlide::orderBy('order_number', 'asc')->get();
		
		return view('admin.index-slides.index', [
			'indexSlides' => $indexSlides
		]);
	}
	
	public function add() {
		
		return view('admin.index-slides.add');
	}
	
	public function insert() {
		
		$request = request();
		
		$formData = $request->validate([
			'title' => 'required',
			'description' => 'present',
			'url' => 'present',
			'slide_photo_file' => 'required|image|mimes:jpeg|max:10240|dimensions:min_width=100,min_height=100',
		]);
		
		$indexSlide = new IndexSlide($formData);
		
		$indexSlide->order_number = IndexSlide::count() + 1;
		
		$indexSlide->save();
		
		if ($request->hasFile('slide_photo_file')) {
			// file has been uploaded
			
			$uploadedFile = $request->file('slide_photo_file');
			
			$newFileName = $indexSlide->id . '_' . $uploadedFile->getClientOriginalName();
			
			//move file to new location with new name
			
			$uploadedFile->storeAs('/index-slides', $newFileName, 'public');
			
			$indexSlide->photo_filename = $newFileName;
			$indexSlide->save();
		}
		
		return redirect()->route('admin.index-slides.index')
				->with('systemMessage', 'Slide has been added!');
	}
	
	public function edit($id) {
		
		$indexSlide = IndexSlide::findOrFail($id);
		
		
		return view('admin.index-slides.edit', [
			'indexSlide' => $indexSlide
		]);
	}
	
	public function update($id) {
		
		$indexSlide = IndexSlide::findOrFail($id);
		
		$request = request();
		
		$formData = $request->validate([
			'title' => 'required',
			'description' => 'present',
			'url' => 'present',
			'slide_photo_file' => 'image|mimes:jpeg|max:10240|dimensions:min_width=100,min_height=100',
		]);
		
		$indexSlide->fill($formData);
		
		$indexSlide->save();
		
		if ($request->hasFile('slide_photo_file')) {
			
			// new uploaded file
			$uploadedFile = $request->file('slide_photo_file');
			
			$publicStorage = \Storage::disk('public');
			
			//if old photo file exists delete old file
			if ($indexSlide->photo_filename && $publicStorage->exists('/index-slides/' . $indexSlide->photo_filename)) {
				
				$publicStorage->delete('/index-slides/' . $indexSlide->photo_filename);
			}
			
			//move new file to new location
			
			$newFileName = $indexSlide->id . '_' . $uploadedFile->getClientOriginalName();
			
			$uploadedFile->storeAs('/index-slides', $newFileName, 'public');
			
			//update new file name in database
			$indexSlide->photo_filename = $newFileName;
			$indexSlide->save();
		}
		
		
		return redirect()->route('admin.index-slides.index')
				->with('systemMessage', 'Slide has been saved');
	}
	
	public function delete() {
		
		$request = request();
		
		$indexSlide = IndexSlide::findOrFail($request->input('id'));
		
		
		//delete from database
		$indexSlide->delete();
		
		IndexSlide::where('order_number', '>', $indexSlide->order_number)
				->decrement('order_number');
		//		->update([
		//			'order_number' => \DB::raw('order_number - 1')
		//		]);
		
		//see if photo file exists
		if (
			$indexSlide->photo_filename 
			&& \Storage::disk('public')
				->exists('/index-slides/' . $indexSlide->photo_filename)
		) {
			
			//delete photo from disk
			\Storage::disk('public')
				->delete('/index-slides/' . $indexSlide->photo_filename);
		}
		
		return redirect()->route('admin.index-slides.index')
				->with('systemMessage', 'Slide has been deleted');
	}
	
	public function enable() {
		$request = request();
		
		$indexSlide = IndexSlide::findOrFail($request->input('id'));
		
		$indexSlide->status = IndexSlide::STATUS_ENABLED;
		
		$indexSlide->save();
		
		return redirect()->route('admin.index-slides.index')
				->with('systemMessage', 'Slide has been enabled');
	}
	
	public function disable() {
		$request = request();
		
		$indexSlide = IndexSlide::findOrFail($request->input('id'));
		
		$indexSlide->status = IndexSlide::STATUS_DISABLED;
		
		$indexSlide->save();
		
		return redirect()->route('admin.index-slides.index')
				->with('systemMessage', 'Slide has been enabled');
	}
	
	public function reorder() {
		
		$request = request();
		
		$orderIds = $request->input('order_ids');
		//$orderIds = "12,56,43"
		
		$ids = explode(',', $orderIds);
		//$ids = ['12', '56', '43']
		
		foreach ($ids as $key => $id) {
			$indexSlide = IndexSlide::findOrFail($id);
			
			$indexSlide->order_number = $key + 1;
			
			$indexSlide->save();
		}
		
		return redirect()->route('admin.index-slides.index')
				->with('systemMessage', 'Slides have been reordered');
	}
}
