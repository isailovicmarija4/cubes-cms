<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['news_id', 'visitor_name', 'body'];
	
	public function myNews() {
		
		return $this->belongsTo(\App\Models\News::class, 'news_id');
	}
}
