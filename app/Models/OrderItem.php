<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
protected $fillable=[
      'status','order_id',
     'product_id','product_title', 'product_photo_url','product_price',
     'quantity'
  ];
 public function order(){
     return $this->belongsTo(\App\Models\Order::class, 'order_id');
 }
 public function subtotal(){
     return $this->quantity * $this->product_price ;
 }
}
