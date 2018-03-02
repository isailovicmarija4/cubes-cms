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
     * @var \App\Webshop\ShoppingCartItem[]
     */
 protected $items=[];
 public function getItems(){
     return $this->items;
 }
 public function addProduct(Product $product,$quantity){
     if(isset($this->items[$product->id])){
         
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
}
