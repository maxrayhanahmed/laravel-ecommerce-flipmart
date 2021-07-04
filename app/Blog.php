<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public $fillable = [
        'admin_id',
        'title',
    	'description',
    	'post_image',
    	'publication_status',
    	
    ];
    
    public function admin()
        {
        return $this->belongsTo('App\Admin');

        }
}
