<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Subcategory;

class Menu extends Model
{
    public $fillable = [
        'menu_id',
        'menuItem',
        'menuImage',
    	'menuDetails',
    	
    ];

     public function categories()
        {
        return $this->hasMany('App\Category','menu_id','id');

        }


    
}
