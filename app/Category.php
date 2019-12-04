<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function parent()
    {
    	return $this->belongsTo(Category::class,'parent_id');
    }
    public function products()
    {
    	return $this->hasMany(Product::class);
    }

    public static function PrentOrNotCategory($parent_id,$child_id)
    {
    	$categores = Category::where('id',$child_id)->where('parent_id',$parent_id)->get();
    	if(!is_null($categores)){
    		return true;
    	}else{
    		return false;
    	}
    }
}
