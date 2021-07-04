<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $fillable = [
    	'user_id',
        'title',
    	'category_id',
    	'tag',
    	'price',
    	'description',
    	'quantity',
    	'type',
    	'publication_status',
    	'brand_id',
    ];

   		public function user()
        {
        return $this->belongsTo('App\Admin');

        }
		public function category()
        {
        return $this->belongsTo('App\Subcategory','category_id','id');

        }
		public function brand()
        {
        return $this->belongsTo('App\Brand');

        }
		
   public function image()
        {
        return $this->hasMany('App\ProductImage');

        }
		



}
