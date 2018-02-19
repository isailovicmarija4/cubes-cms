<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\ProductBrand;

class ProductBrandsController extends Controller
{
    public function index() {
		
		$productBrands = ProductBrand::orderBy('title')->get();
		
		return view('admin.product-brands.index', [
			'productBrands' => $productBrands
		]);
	}
	
	public function add() {
		return view('admin.product-brands.add');
	}
	
	public function insert() {
		
		$request = request();
		
		$formData = $request->validate([
			'title' => 'required|string|min:2|max:20',
			'website_url' => 'string|max:255'
		]);
		
		$productBrand = ProductBrand::create($formData);
		
		return redirect()
				->route('admin.product-brands.index')
				->with('systemMessage', 'Product brand has been added');
	}
	
	public function edit($id) {
		
		$productBrand = ProductBrand::findOrFail($id);
		
		return view('admin.product-brands.edit', [
			'productBrand' => $productBrand
		]);
	}
	
	public function update($id) {
		$productBrand = ProductBrand::findOrFail($id);
		
		$request = request();
		
		$formData = $request->validate([
			'title' => 'required|string|min:2|max:20',
			'website_url' => 'string|max:255'
		]);
		
		$productBrand->fill($formData);
		
		$productBrand->save();
		
		return redirect()
				->route('admin.product-brands.index')
				->with('systemMessage', 'Product brand has been saved');
	}
	
	public function delete() {
		
		$request = request();
		
		$id = $request->input('id');
		
		$productBrand = ProductBrand::findOrFail($id);
		
		//brisanje zapisa iz baze
		
		if ($productBrand->products()->count() > 0) {
			
			return redirect()->back()
					->with('systemError', 'There are products in product brand, unable to delete');
		}
		
		$productBrand->delete();
		
		return redirect()
				->route('admin.product-brands.index')
				->with('systemMessage', 'Product brand has been deleted');
	}
}
