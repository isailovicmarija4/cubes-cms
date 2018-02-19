<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductBrand;
use App\Models\Tag;

class ProductsController extends Controller
{
	public function index() {
		
		
		return view('admin.products.index');
	}
	
	public function datatable() {
		$columns = ['id', 'product_brand_title', 'product_category_title', 'title', 'price', 'quantity', 'on_sale', 'discount', 'actions'];
		
		$request = request();
		
		$query = Product::query();
		
		
		// JOIN related tables
		$query->leftJoin(
			'product_brands',
			'products.product_brand_id',
			'=',
			'product_brands.id'
		)->leftJoin(
			'product_categories',
			'products.product_category_id',
			'=',
			'product_categories.id'
		);
		
		
		//Process search parameter
		
		$search = $request->get('search');
		
		if (is_array($search) && !empty($search['value'])) {
			
			$query->where(function($subQuery) use($search) {
				
				$subQuery->orWhere(
					'products.title', 
					'LIKE', 
					'%' . $search['value'] . '%'
				)->orWhere(
					'product_categories.title', 
					'LIKE', 
					'%' . $search['value'] . '%'
				)->orWhere(
					'product_brands.title', 
					'LIKE', 
					'%' . $search['value'] . '%'
				);
			});
		}
		
		//Process ordering
		$order = $request->get('order');
		if (is_array($order) && !empty($order)) {
			foreach($order as $orderColumn) {
				
				$columnName = $columns[$orderColumn['column']];
				
				$dir = $orderColumn['dir'];
				
				switch ($columnName) {
					
					case 'id':
					case 'title':
					case 'price':
					case 'quantity':
					case 'on_sale':
					case 'discount':
						$query->orderBy('products.' . $columnName, $dir);
						break;
					
					case 'product_brand_title':
						$query->orderBy('product_brands.title', $dir);
						break;
					case 'product_category_title':
						$query->orderBy('product_categories.title', $dir);
						break;
						
				}
			}
		}
		
		//Process Pagination
		$length = $request->get('length', 10);
		$start = $request->get('start', 0);
		
		$page = floor($start / $length) + 1;
		
		$products = $query->paginate($length, ['products.*'], 'page', $page);
		
		
		// Format JSON response
		$datatableJson = [
			'draw' => $request->get('draw', 1),
			'recordsTotal' => $products->total(),
			'recordsFiltered' => $products->total(),
			'data' => []
		];
		
		foreach($products as $product) {
			
			$row = [
				'id' => $product->id,
				'product_brand_title' => optional($product->productBrand)->title,
				'product_category_title' => optional($product->productCategory)->title,
				'title' => $product->title,
				'price' => $product->price,
				'quantity' => $product->quantity,
				'on_sale' => $product->on_sale ? '<i class="text-success fa fa-check-circle"></i>' : '-',
				'discount' => $product->on_sale ? $product->discount : '-',
				'actions' => view('admin.products.partials.actions', ['product' => $product])->render()
			];
			
			$datatableJson['data'][] = $row;
		}
		
		
		return response()->json($datatableJson);
	}
	
	public function add() {
		
		$productCategories = ProductCategory::orderBy('title')->get();
		$productBrands = ProductBrand::orderBy('title')->get();
		$tags = Tag::orderBy('title')->get();
		
		return view('admin.products.add', [
			'productCategories' => $productCategories,
			'productBrands' => $productBrands,
			'tags' => $tags,
		]);
	}
	
	public function insert() {
		
		$request = request();
		
		$formData = $request->validate([
			
			'product_category_id' => 'required|exists:product_categories,id',
			'product_brand_id' => 'required',
			'title' => 'required',
			'description' => 'present',
			'specification' => 'present',
			'price' => 'present',
			'quantity' => 'present',
			'on_sale' => 'present',
			'discount' => 'present',
			
			'product_photo_file' => 'image|mimes:jpeg|max:10240|dimensions:min_width=100,min_height=100',
			
			'tag_ids' => 'required|array|min:3|exists:tags,id'
		]);
		
		$product = new Product($formData);
		
		$product->save();
		
//		foreach ($formData['tag_ids'] as $tagId) {
//			\DB::table('products_tags')->insert([
//				'product_id' => $product->id,
//				'tag_id' => $tag
//			]);
//		}
		
		
		// attach - kreiraju se nove veze 
		// detach - brisu se postojece veze 
		// sync - detach + attach
		
		$product->tags()->sync($formData['tag_ids']);
		
		if ($request->hasFile('product_photo_file')) {
			// file has been uploaded
			
			$uploadedFile = $request->file('product_photo_file');
			
			// file name on local computer
			//dd($uploadedFile->getClientOriginalName());
			
			//file extension on local computer
			//dd($uploadedFile->getClientOriginalExtension());
			
			$newFileName = $product->id . '_' . $uploadedFile->getClientOriginalName();
			
			//move file to new location with new name
			
			$uploadedFile->move(
				public_path('/storage/products'),
				$newFileName
			);
			
			$product->photo_filename = $newFileName;
			$product->save();
		}
		
		return redirect()->route('admin.products.index')
				->with('systemMessage', 'Product has been added!');
	}
	
	public function edit($id) {
		
		$product = Product::findOrFail($id);
		
		$productCategories = ProductCategory::orderBy('title')->get();
		$productBrands = ProductBrand::orderBy('title')->get();
		$tags = Tag::orderBy('title')->get();
		
		return view('admin.products.edit', [
			'product' => $product,
			'productCategories' => $productCategories,
			'productBrands' => $productBrands,
			'tags' => $tags,
		]);
	}
	
	public function update($id) {
		
		$product = Product::findOrFail($id);
		
		$request = request();
		
		$formData = $request->validate([
			
			'product_category_id' => 'required|exists:product_categories,id',
			'product_brand_id' => 'required',
			'title' => 'required',
			'description' => 'present',
			'specification' => 'present',
			'price' => 'present',
			'quantity' => 'present',
			'on_sale' => 'present',
			'discount' => 'present',
			
			'product_photo_file' => 'image|mimes:jpeg|max:10240|dimensions:min_width=100,min_height=100',
		
			'tag_ids' => 'required|array|min:3|exists:tags,id',
		]);
		
		$product->fill($formData);
		
		$product->save();
		
		//save chosen tag ids
		$product->tags()->sync($formData['tag_ids']);
		
		if ($request->hasFile('product_photo_file')) {
			
			// new uploaded file
			$uploadedFile = $request->file('product_photo_file');
			
			$publicStorage = \Storage::disk('public');
			
			//if old photo file exists delete old file
			if ($product->photo_filename && $publicStorage->exists('/products/' . $product->photo_filename)) {
				
				$publicStorage->delete('/products/' . $product->photo_filename);
			}
			
			//move new file to new location
			
			$newFileName = $product->id . '_' . $uploadedFile->getClientOriginalName();
			
			$uploadedFile->storeAs('/products', $newFileName, 'public');
			
			//update new file name in database
			$product->photo_filename = $newFileName;
			$product->save();
		}
		
		
		return redirect()->route('admin.products.index')
				->with('systemMessage', 'Product has been saved');
	}
	
	public function delete() {
		
		$request = request();
		
		$product = Product::findOrFail($request->input('id'));
		
		
		//delete from database
		$product->delete();
		
		// delete relations to tags table
		$product->tags()->detach();
		
		//see if photo file exists
		if (
			$product->photo_filename 
			&& \Storage::disk('public')
				->exists('/products/' . $product->photo_filename)
		) {
			
			//delete photo from disk
			\Storage::disk('public')
				->delete('/products/' . $product->photo_filename);
		}
		
		return redirect()->route('admin.products.index')
				->with('systemMessage', 'Product has been deleted');
	}
}
