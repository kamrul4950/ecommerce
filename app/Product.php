<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    function images()
    {
    	return $this->hasMany('App\ProductImage');
    }
}
