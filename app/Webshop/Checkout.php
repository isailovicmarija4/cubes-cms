<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Webshop;

/**
 * Description of Checkout
 *
 * @author backend
 */
class Checkout {
    
    
public  static function getCheckoutFromSession(){
        if(session()->exists('checkout')){
           $checkout=session()->get('checkout');
       }else{
           $checkout=new Checkout();
           session()->put('checkout',$checkout);
       }
       return $checkout;
    }
    
    
    
    
protected $customerName;
protected $customerEmail;
protected $customerPhone;
protected $customerCountry;
protected $customerCity;
protected $customerZip;
protected $customerAddress;

protected $deliveryCountry;
protected $deliveryCity;
protected $deliveryZip;
protected $deliveryAddress;


public function getCustomerName() {
    return $this->customerName;
}

public function getCustomerEmail() {
    return $this->customerEmail;
}

public function getCustomerPhone() {
    return $this->customerPhone;
}

public function getCustomerCountry() {
    return $this->customerCountry;
}

public function getCustomerCity() {
    return $this->customerCity;
}

public function getCustomerZip() {
    return $this->customerZip;
}

public function getCustomerAddress() {
    return $this->customerAddress;
}

public function getDeliveryCountry() {
    return $this->deliveryCountry;
}

public function getDeliveryCity() {
    return $this->deliveryCity;
}

public function getDeliveryZip() {
    return $this->deliveryZip;
}

public function getDeliveryAddress() {
    return $this->deliveryAddress;
}

public function setCustomerName($customerName) {
    $this->customerName = $customerName;
    return $this;
}

public function setCustomerEmail($customerEmail) {
    $this->customerEmail = $customerEmail;
    return $this;
}

public function setCustomerPhone($customerPhone) {
    $this->customerPhone = $customerPhone;
    return $this;
}

public function setCustomerCountry($customerCountry) {
    $this->customerCountry = $customerCountry;
    return $this;
}

public function setCustomerCity($customerCity) {
    $this->customerCity = $customerCity;
    return $this;
}

public function setCustomerZip($customerZip) {
    $this->customerZip = $customerZip;
    return $this;
}

public function setCustomerAddress($customerAddress) {
    $this->customerAddress = $customerAddress;
    return $this;
}

public function setDeliveryCountry($deliveryCountry) {
    $this->deliveryCountry = $deliveryCountry;
    return $this;
}

public function setDeliveryCity($deliveryCity) {
    $this->deliveryCity = $deliveryCity;
    return $this;
}

public function setDeliveryZip($deliveryZip) {
    $this->deliveryZip = $deliveryZip;
    return $this;
}

public function setDeliveryAddress($deliveryAddress) {
    $this->deliveryAddress = $deliveryAddress;
    return $this;
}



}
