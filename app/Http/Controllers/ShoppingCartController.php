<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ShoppingCartController extends Controller
{
  public function index(){
      return view('front.shopping-cart.index');
  }
  public function addProduct(){
      $request=request();
      $formData=$request->validate([
          'product_id'=> 'required|exists:products.id',
          'quantity'=> 'required|integer|min:1',
      ]);
      $product= Product::findOrFail($formData['product_id']);
      
      //add to cart
      
      
      return redirect()->route('shopping-cart')
              ->with('systemMessage',"Product has been added to cart");
  }
  public function removeProduct(){
        $request=request();
      $formData=$request->validate([
          'product_id'=> 'required|exists:products.id'
        
      ]);
      $product= Product::findOrFail($formData['product_id']);
      
      //add to cart
      
      
      return redirect()->route('shopping-cart')
              ->with('systemMessage',"Product has been removed tfrom cart");
  }
}
