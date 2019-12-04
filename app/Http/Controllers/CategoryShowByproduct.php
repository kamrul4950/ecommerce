<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryShowByproduct extends Controller
{
    public function show($id)
    {
    	$category = Category::find($id);
    	if(!is_null($category)){
    		return view('category.show',compact('category'));
    	}else{
    		session()->flash('error','Sorry This Category ID Has No Product');
    		return redirect('/');
    	}
    }
}
