<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Webshop;
use App\Models\Product;

/**
 * Description of ShoppingCart
 *
 * @author backend
 */
class ShoppingCart {
    /**
     * 
     * @return \App\Webshop\ShoppingCart
     */
    public static function getCartFromSession(){
           if(session()->exists('shopping-cart')){
           $shoppingCart=session()->get('shopping-cart');
      }  else{ 
          $shoppingCart=new ShoppingCart();
      session()->put('shopping-cart',$shoppingCart);
      
      }
      return $shoppingCart;
    }
    
    
    
    
    /**
     * @var \App\Webshop\ShoppingCartItem[]
     */
 protected $items=[];
 public function getItems(){
     return $this->items;
 }
 public function addProduct(Product $product,$quantity){
     if(isset($this->items[$product->id])){
         $existingShoppingCartItem=$this->items[$product->id];
           $existingShoppingCartItem->increaseQuantity($quantity);
         
     }else{
         //new item
         $newShoppingCartItem= new ShoppingCartItem();
         $newShoppingCartItem->setProductId($product->id);
         $newShoppingCartItem->setProductTitle($product->title);
         $newShoppingCartItem->setProductPrice($product->price);
          $newShoppingCartItem->setProductPhotoUrl($product->photoUrl());
          
          $newShoppingCartItem->setQuantity($quantity);
          $this->items[$product->id]=  $newShoppingCartItem;
     }
     
 }
 public function removeProduct($productId){
     if(isset($this->items[$productId])){
     unset($this->items[$productId]);
     }
     return $this;
 }
 /**
  * 
  * @return int
  * 
  */
  public function itemsCount(){
      return count($this->items);
  }
  
  /**
   * 
   * @return boolean
   */
 public function isEmpty(){
      return $this->itemsCount()==0;
  }
  public function total(){
      $total=0;
      foreach($this->items as $item){
          $total += $item->subtotal();
      }
    return $total;
  }
  public function clearItems(){
      $this->items=[];
      return $this;
  }
}
