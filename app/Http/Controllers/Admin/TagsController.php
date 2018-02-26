<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Tag;

class TagsController extends Controller
{
	public function index() {
		
		return view('admin.tags.index');
	}
	
	public function datatable() {
		$columns = ['id', 'title', 'actions'];
		
		$request = request();
		
		$query = Tag::query();
		
		//Process search parameter
		
		$search = $request->get('search');
		
		if (is_array($search) && !empty($search['value'])) {
			
			$query->where(function($subQuery) use($search) {
				
				$subQuery->orWhere(
					'title', 
					'LIKE', 
					'%' . $search['value'] . '%'
				)->orWhere(
					'id', 
					'LIKE', 
					'%' . $search['value'] . '%'
				);
			});
		}
		
		//Process ordering
		$order = $request->get('order');
		
		if (is_array($order) && !empty($order)) {
			
			foreach($order as $orderColumn) {
				
				if (!isset($columns[$orderColumn['column']])) {
					continue;
				}
				
				$column = $columns[$orderColumn['column']];
				
				$dir = $orderColumn['dir'] == 'desc' ? 'desc' : 'asc';
				
				switch ($column) {
					
					case 'id':
					case 'title':
						$query->orderBy($column, $dir);
						break;	
				}
			}
		}
		
		//Process Pagination
		$length = $request->get('length', 10);
		$start = $request->get('start', 0);
		
		$page = floor($start / $length) + 1;
		
		$tags = $query->paginate($length, ['*'], 'page', $page);
		
		
		// Format JSON response
		$datatableJson = [
			'draw' => $request->get('draw', 1),
			'recordsTotal' => $tags->total(),
			'recordsFiltered' => $tags->total(),
			'data' => []
		];
		
		foreach($tags as $tag) {
			
			$row = [
				'id' => $tag->id,
				'title' => $tag->title,
				'actions' => view('admin.tags.partials.actions', ['tag' => $tag])->render()
			];
			
			$datatableJson['data'][] = $row;
		}
		
		
		return response()->json($datatableJson);
	}
	
	public function add() {
		return view('admin.tags.add');
	}
	
	public function insert() {
		
		$request = request();
		
		$formData = $request->validate([
			'title' => 'required|string|min:2|max:20'
		]);
		
		//dd($formData);
		
		
//		//Nacin 1 bez obzira da li je polje fillable ili ne
//		$tag = new Tag();
//		$tag->title = $formData['title'];
//		//...
//		$tag->save();
//		
//		//Nacin 2 fillable polja
//		$tag = new Tag();
//		$tag->fill($formData);
//		$tag->save();
//		
//		//Nacin 3 fillable polja skraceno
//		$tag = new Tag($formData);
//		$tag->save();
		
		//Nacin 4 create metoda
		$tag = Tag::create($formData);
		
		return redirect()
				->route('admin.tags.index')
				->with('systemMessage', 'Tag has been added');
	}
	
	public function edit($id) {
		
		$tag = Tag::findOrFail($id);
		
		return view('admin.tags.edit', [
			'tag' => $tag
		]);
	}
	
	public function update($id) {
		$tag = Tag::findOrFail($id);
		
		$request = request();
		
		$formData = $request->validate([
			'title' => 'required|string|min:2|max:20'
		]);
		
		$tag->fill($formData);
		
		$tag->save();
		
		return redirect()
				->route('admin.tags.index')
				->with('systemMessage', 'Tag has been saved');
	}
	
	public function delete() {
		
		$request = request();
		
		$id = $request->input('id');
		
		$tag = Tag::findOrFail($id);
		
		//brisanje zapisa iz baze
		
		\DB::table('news_tags')->where('tag_id', '=', $tag->id)->delete();
		
		$tag->delete();
		
		return redirect()
				->route('admin.tags.index')
				->with('systemMessage', 'Tag has been deleted');
	}
}
