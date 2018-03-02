<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Webshop;

/**
 * Description of ShoppingCartItem
 *
 * @author backend
 */
class ShoppingCartItem {
  protected $productId;
   protected $productTitle;
    protected $productPrice;
     protected $productPhotoUrl;
     
     protected $quantity=0;
     public function getProductId() {
         return $this->productId;
     }

     public function getProductTitle() {
         return $this->productTitle;
     }

     public function getProductPrice() {
         return $this->productPrice;
     }

     public function getProductPhotoUrl() {
         return $this->productPhotoUrl;
     }

     public function getQuantity() {
         return $this->quantity;
     }

     public function setProductId($productId) {
         $this->productId = $productId;
         return $this;
     }

     public function setProductTitle($productTitle) {
         $this->productTitle = $productTitle;
         return $this;
     }

     public function setProductPrice($productPrice) {
         $this->productPrice = $productPrice;
         return $this;
     }

     public function setProductPhotoUrl($productPhotoUrl) {
         $this->productPhotoUrl = $productPhotoUrl;
         return $this;
     }

     public function setQuantity($quantity) {
         $this->quantity = $quantity;
         return $this;
     }


}
