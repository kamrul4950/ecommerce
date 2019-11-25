<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class Pagecontrol extends Controller
{
    function index()
    {
    	$product = Product::orderBy('id','desc')->get();
    	return view('pages.index')->with('products',$product);
    }

    function contact()
    {
    	return view('pages.contact');
    }

    
}
