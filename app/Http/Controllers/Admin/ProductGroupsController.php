<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\ProductGroup;

class ProductGroupsController extends Controller
{
    public function index() {
		
		$productGroups = ProductGroup::orderBy('title')->get();
		
		return view('admin.product-groups.index', [
			'productGroups' => $productGroups
		]);
	}
	
	public function add() {
		return view('admin.product-groups.add');
	}
	
	public function insert() {
		
		$request = request();
		
		$formData = $request->validate([
			'title' => 'required|string|min:2|max:20'
		]);
		
		$productGroup = ProductGroup::create($formData);
		
		return redirect()
				->route('admin.product-groups.index')
				->with('systemMessage', 'Product group has been added');
	}
	
	public function edit($id) {
		
		$productGroup = ProductGroup::findOrFail($id);
		
		return view('admin.product-groups.edit', [
			'productGroup' => $productGroup
		]);
	}
	
	public function update($id) {
		$productGroup = ProductGroup::findOrFail($id);
		
		$request = request();
		
		$formData = $request->validate([
			'title' => 'required|string|min:2|max:20'
		]);
		
		$productGroup->fill($formData);
		
		$productGroup->save();
		
		return redirect()
				->route('admin.product-groups.index')
				->with('systemMessage', 'ProductGroup has been saved');
	}
	
	public function delete() {
		
		$request = request();
		
		$id = $request->input('id');
		
		$productGroup = ProductGroup::findOrFail($id);
		
		//brisanje zapisa iz baze
		
		if ($productGroup->productCategories()->count() > 0) {
			
			return redirect()->back()
					->with('systemError', 'There are categories in product group, unable to delete');
		}
		
		$productGroup->delete();
		
		return redirect()
				->route('admin.product-groups.index')
				->with('systemMessage', 'Product group has been deleted');
	}
}
