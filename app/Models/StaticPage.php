<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{
	const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 0;
	
		
    protected $fillable = [
		'parent_id', 'short_title', 'title', 'description', 'photo_filename', 'body',
		'status', 'order_number'
	];
    public function childPages(){
      return  $this->hasMany(self::class,'parent_id');
    }
      public function parentPage(){
      return  $this->belongsTo(self::class,'parent_id');
    }
    public function scopeEnabled($query){
    return    $query->where('status','=',self::STATUS_ENABLED);
       
    }
      public function scopeRootPages($query){
       return $query->where('parent_id','=',0);
    }
	
	public function isEnabled() {
		return $this->status == 1;
	}
        public function frontendUrl(){
            return route('static-page',[
                'id'=>$this->id,
                'slug'=>str_slug($this->title),
            ]);
        }
        /**
         * 
         * @return \App\Models\StaticPage[] Breadcrumbs pages includings page itself
         */
        public function breadcrumbs(){
              $breadcrumbs=[$this];
       $parentPage= $this->parentPage;
       while($parentPage != null){
           array_unshift($breadcrumbs, $parentPage);
           $parentPage=$parentPage->parentPage;
        }
        return $breadcrumbs;
}
}