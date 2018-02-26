<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndexSlide extends Model
{
	const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 0;
	
	protected $table = 'index_slides';
	
	protected $fillable = ['title', 'url', 'description', 'photo_filename', 'status', 'order_number'];

	/**
	 * @return boolean
	 */
	public function isEnabled() {
		return $this->status == self::STATUS_ENABLED;
	}
	
	public function scopeEnabled($query) {
		return $query->where('status', '=', self::STATUS_ENABLED);
	}
}
