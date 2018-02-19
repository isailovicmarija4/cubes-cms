<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['title'];
	
	public function myNews() {
		return $this->belongsToMany(
			\App\Models\News::class,
			'news_tags',
			'tag_id',
			'news_id'
		);
	}
	
	public function products() {
		
		return $this->belongsToMany(
			\App\Models\Product::class,
			'products_tags',
			'tag_id',
			'product_id'
		);
	}
}
