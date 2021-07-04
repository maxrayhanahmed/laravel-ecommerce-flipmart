<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    public $fillable = [
        'categoryId',
        'subcatName',
    	'subcatCode'	
    ];

 	
}
