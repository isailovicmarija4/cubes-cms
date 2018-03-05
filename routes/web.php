<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');

Route::get('/products', 'ProductsController@allProducts')->name('products.all');
Route::get('/products/category/{id}', 'ProductsController@category')->name('products.category');
Route::get('/products/product/{id}', 'ProductsController@oneProduct')->name('products.product');
Route::get('/products/on-sale', 'ProductsController@onSale')->name('products.on-sale');

Route::get('/contact-us', 'ContactController@show')->name('contact-us');
Route::post('/contact-us', 'ContactController@process');

Route::get('/page/{id}/{slug?}', 'StaticPagesController@page')->name('static-page');

Route::get('/shopping-cart', 'ShoppingCartController@index')->name('shopping-cart');
Route::post('/shopping-cart/add-product', 'ShoppingCartController@addProduct')->name('shopping-cart.add-product');
Route::post('/shopping-cart/remove-product', 'ShoppingCartController@removeProduct')->name('shopping-cart.remove-product');

Route::get('/checkout', 'CheckoutController@index')->name('checkout');
Route::post('/checkout', 'CheckoutController@process');
Route::get('/checkout/confirmation', 'CheckoutController@confirmation')->name('checkout.confirmation');
Route::get('/checkout/finish', 'CheckoutController@finish')->name('checkout.finish');

Auth::routes();

// CMS Admin routes

Route::middleware('auth')
	->prefix('admin')
	->namespace('Admin')
	->group(function () {
		
		
	Route::get('/', function() {
		//return redirect('/admin/dashboard');
		
		return redirect()->route('admin.dashboard');
	});
	
	Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');
	
	
	//Tags routes
	Route::get('/tags', 'TagsController@index')->name('admin.tags.index');
	Route::get('/tags/datatable', 'TagsController@datatable')->name('admin.tags.datatable');
	
	Route::get('/tags/add', 'TagsController@add')->name('admin.tags.add');
	Route::post('/tags/add', 'TagsController@insert');
			
	Route::get('/tags/edit/{id}', 'TagsController@edit')->name('admin.tags.edit');
	Route::post('/tags/edit/{id}', 'TagsController@update');
	
	Route::post('/tags/delete', 'TagsController@delete')->name('admin.tags.delete');
	
	
	
	//Product Groups routes
	Route::get('/product-groups', 'ProductGroupsController@index')->name('admin.product-groups.index');
	
	Route::get('/product-groups/add', 'ProductGroupsController@add')->name('admin.product-groups.add');
	Route::post('/product-groups/add', 'ProductGroupsController@insert');
			
	Route::get('/product-groups/edit/{id}', 'ProductGroupsController@edit')->name('admin.product-groups.edit');
	Route::post('/product-groups/edit/{id}', 'ProductGroupsController@update');
	
	Route::post('/product-groups/delete', 'ProductGroupsController@delete')->name('admin.product-groups.delete');
	
	//Product Categories routes
	Route::get('/product-categories', 'ProductCategoriesController@index')->name('admin.product-categories.index');
	
	Route::get('/product-categories/add', 'ProductCategoriesController@add')->name('admin.product-categories.add');
	Route::post('/product-categories/add', 'ProductCategoriesController@insert');
			
	Route::get('/product-categories/edit/{id}', 'ProductCategoriesController@edit')->name('admin.product-categories.edit');
	Route::post('/product-categories/edit/{id}', 'ProductCategoriesController@update');
	
	Route::post('/product-categories/delete', 'ProductCategoriesController@delete')->name('admin.product-categories.delete');

	
	//Product Brands routes
	Route::get('/product-brands', 'ProductBrandsController@index')->name('admin.product-brands.index');
	
	Route::get('/product-brands/add', 'ProductBrandsController@add')->name('admin.product-brands.add');
	Route::post('/product-brands/add', 'ProductBrandsController@insert');
			
	Route::get('/product-brands/edit/{id}', 'ProductBrandsController@edit')->name('admin.product-brands.edit');
	Route::post('/product-brands/edit/{id}', 'ProductBrandsController@update');
	
	Route::post('/product-brands/delete', 'ProductBrandsController@delete')->name('admin.product-brands.delete');
	
	
	//Products routes
	Route::get('/products', 'ProductsController@index')->name('admin.products.index');
	Route::get('/products/datatable', 'ProductsController@datatable')->name('admin.products.datatable');
	
	Route::get('/products/add', 'ProductsController@add')->name('admin.products.add');
	Route::post('/products/add', 'ProductsController@insert');
			
	Route::get('/products/edit/{id}', 'ProductsController@edit')->name('admin.products.edit');
	Route::post('/products/edit/{id}', 'ProductsController@update');
	
	Route::post('/products/delete', 'ProductsController@delete')->name('admin.products.delete');
	
	
	//Users routes
	Route::get('/users', 'UsersController@index')->name('admin.users.index');
	
	Route::get('/users/add', 'UsersController@add')->name('admin.users.add');
	Route::post('/users/add', 'UsersController@insert');
			
	Route::get('/users/edit/{id}', 'UsersController@edit')->name('admin.users.edit');
	Route::post('/users/edit/{id}', 'UsersController@update');
	
	Route::post('/users/delete', 'UsersController@delete')->name('admin.users.delete');
	
	Route::post('/users/check-email', 'UsersController@checkEmail')->name('admin.users.check-email');
	
	//Profile Routes
	Route::get('/profile/edit', 'ProfileController@edit')->name('admin.profile.edit');
	Route::post('/profile/edit', 'ProfileController@update');
	
	Route::get('/profile/change-password', 'ProfileController@changePassword')->name('admin.profile.change-password');
	Route::post('/profile/change-password', 'ProfileController@updatePassword');
	
	//Index slides routes
	Route::get('/index-slides', 'IndexSlidesController@index')->name('admin.index-slides.index');
	
	Route::get('/index-slides/add', 'IndexSlidesController@add')->name('admin.index-slides.add');
	Route::post('/index-slides/add', 'IndexSlidesController@insert');
			
	Route::get('/index-slides/edit/{id}', 'IndexSlidesController@edit')->name('admin.index-slides.edit');
	Route::post('/index-slides/edit/{id}', 'IndexSlidesController@update');
	
	Route::post('/index-slides/delete', 'IndexSlidesController@delete')->name('admin.index-slides.delete');
	Route::post('/index-slides/enable', 'IndexSlidesController@enable')->name('admin.index-slides.enable');
	Route::post('/index-slides/disable', 'IndexSlidesController@disable')->name('admin.index-slides.disable');
	Route::post('/index-slides/reorder', 'IndexSlidesController@reorder')->name('admin.index-slides.reorder');
	
        //Filemanager routes
	Route::get('/filemanager', 'FileManagerController@index')->name('admin.filemanager.index');
	Route::get('/filemanager/popup', 'FileManagerController@popup')->name('admin.filemanager.popup');
	Route::any('/filemanager/connector', 'FileManagerController@connector')->name('admin.filemanager.connector');
        
        //Static pages routes
        Route::get('/static-pages/list/{parentId?}', 'StaticPagesController@index')->name('admin.static-pages.index');
	
	Route::get('/static-pages/add/{parentId?}', 'StaticPagesController@add')->name('admin.static-pages.add');
	Route::post('/static-pages/add/{parentId?}', 'StaticPagesController@insert');
			
	Route::get('/static-pages/edit/{id}', 'StaticPagesController@edit')->name('admin.static-pages.edit');
	Route::post('/static-pages/edit/{id}', 'StaticPagesController@update');
	
	Route::post('/static-pages/delete', 'StaticPagesController@delete')->name('admin.static-pages.delete');
	Route::post('/static-pages/enable', 'StaticPagesController@enable')->name('admin.static-pages.enable');
	Route::post('/static-pages/disable', 'StaticPagesController@disable')->name('admin.static-pages.disable');
	Route::post('/static-pages/reorder', 'StaticPagesController@reorder')->name('admin.static-pages.reorder');
});
