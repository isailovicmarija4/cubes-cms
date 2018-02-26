<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductGroup extends Model
{
    protected $fillable = ['title'];
	
	public function productCategories() {
		
		return $this->hasMany(
			\App\Models\ProductCategory::class,
			'product_group_id'
		);
	}
}
