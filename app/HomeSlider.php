<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeSlider extends Model
{
    public $fillable = [
        'productId',
        'slideRating',
    	'publishStatus',
    	
    ];
    public function product()
        {
        return $this->belongsTo('App\Product','productId','id');

        }
}
