<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $fillable = [
        'categoryName',
        'categoryDetails',
    	
    ];

     public function subCat()
        {
        return $this->hasMany('App\Subcategory','categoryId','id');

        }


}
