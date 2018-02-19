<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductBrand extends Model
{
    protected $fillable = ['title', 'website_url'];
	
	public function products() {
		return $this->hasMany(\App\Models\Product::class, 'product_brand_id');
	}
}
