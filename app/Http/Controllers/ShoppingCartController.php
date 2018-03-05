<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Webshop\ShoppingCart;



class ShoppingCartController extends Controller
{
  public function index(){
     $shoppingCart= ShoppingCart::getCartFromSession();
      
      
      
      return view('front.shopping-cart.index',[
          'shoppingCart'=>$shoppingCart
      ]);
  }
  public function addProduct(){
      $request=request();
      $formData=$request->validate([
          'product_id'=> 'required|exists:products,id',
          'quantity'=> 'required|integer|min:1',
      ]);
      $product= Product::findOrFail($formData['product_id']);
      
      //add to cart
    $shoppingCart= ShoppingCart::getCartFromSession();
     
       $shoppingCart->addProduct($product, $formData['quantity']);
   
      return redirect()->route('shopping-cart')
              ->with('systemMessage',"Product has been added to cart");
  }
  public function removeProduct(){
        $request=request();
      $formData=$request->validate([
          'product_id'=> 'required|exists:products,id'
        
      ]);
  
      
      //remove from cart
      ShoppingCart::getCartFromSession()->removeProduct($formData['product_id']);
      
      
      return redirect()->route('shopping-cart')
              ->with('systemMessage',"Product has been removed from cart");
  }
}
