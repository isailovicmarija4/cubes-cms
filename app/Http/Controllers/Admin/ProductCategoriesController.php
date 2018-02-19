<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\ProductCategory;
use App\Models\ProductGroup;

class ProductCategoriesController extends Controller
{
    public function index() {
		
		$productCategories = ProductCategory::orderBy('title')->get();
		
		return view('admin.product-categories.index', [
			'productCategories' => $productCategories
		]);
	}
	
	public function add() {
		
		$allProductGroups = ProductGroup::orderBy('title')->get();
			
		return view('admin.product-categories.add', [
			'allProductGroups' => $allProductGroups
		]);
	}
	
	public function insert() {
		
		$request = request();
		
		$formData = $request->validate([
			'product_group_id' => 'required|exists:product_groups,id',
			'title' => 'required|string|min:2|max:20',
			'description' => 'present'
		]);
		
		$productCategory = ProductCategory::create($formData);
		
		return redirect()
				->route('admin.product-categories.index')
				->with('systemMessage', 'Product category has been added');
	}
	
	public function edit($id) {
		
		$productCategory = ProductCategory::findOrFail($id);
		
		$allProductGroups = ProductGroup::orderBy('title')->get();
		
		return view('admin.product-categories.edit', [
			'productCategory' => $productCategory,
			'allProductGroups' => $allProductGroups
		]);
	}
	
	public function update($id) {
		$productCategory = ProductCategory::findOrFail($id);
		
		$request = request();
		
		$formData = $request->validate([
			'product_group_id' => 'required|exists:product_groups,id',
			'title' => 'required|string|min:2|max:20',
			'description' => 'present'
		]);
		
		$productCategory->fill($formData);
		
		$productCategory->save();
		
		return redirect()
				->route('admin.product-categories.index')
				->with('systemMessage', 'Product category has been saved');
	}
	
	public function delete() {
		
		$request = request();
		
		$id = $request->input('id');
		
		$productCategory = ProductCategory::findOrFail($id);
		
		//brisanje zapisa iz baze
		
		if ($productCategory->products()->count() > 0) {
			
			return redirect()->back()
					->with('systemError', 'There are products in product category, unable to delete!');
		}
		
		$productCategory->delete();
		
		return redirect()
				->route('admin.product-categories.index')
				->with('systemMessage', 'Product category has been deleted');
	}
}
