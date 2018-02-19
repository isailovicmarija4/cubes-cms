<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\ProductCategory;

class ProductsController extends Controller
{
	public function allProducts() {
		
		$products = Product::orderBy('created_at', 'desc')->paginate(12);
		
		return view('front.products.index', [
			'products' => $products
		]);
	}
	
	public function onSale() {
		
	}
	
	public function category($id) {
		
		$productCategory = ProductCategory::findOrFail($id);
		
		//$products = Product::where('product_category_id', '=', $id)
		//			->paginate(12);
		
		$products = $productCategory->products()->paginate(12);
		
		return view('front.products.category', [
			'productCategory' => $productCategory,
			'products' => $products
		]);
	}
	
	public function oneProduct($id) {
		
		$product = Product::findOrFail($id);
		
		return view('front.products.product', [
			'product' => $product
		]);
	}
}
