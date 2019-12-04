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

    public function search(Request $request)
    {
    	$search = $request->search;
    	$products = Product::orWhere('title','like','%'.$search.'%')
    	->orWhere('description','like','%'.$search.'%')
    	->orWhere('quantity','like','%'.$search.'%')
    	->orWhere('price','like','%'.$search.'%')
    	->orderBy('id','desc')
    	->paginate(6);
    	return view('pages.search',compact('search','products'));

    }

    
}
