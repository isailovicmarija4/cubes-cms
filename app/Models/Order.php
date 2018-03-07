<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $fillable=[
      'status','customer_name','customer_email','customer_phone',
      'customer_country','customer_city','customer_zip','customer_address',
       'delivery_country','delivery_city','delivery_zip','delivery_address',
  ];
   public function orderItems(){
     return $this->hasMany(\App\Models\OrderItem::class, 'order_id');
 }
 public function total(){
     $total=0;
     foreach($this->orderItems as $orderItem){
         $total += $orderItem->subtotal();
     }
 }
}
 