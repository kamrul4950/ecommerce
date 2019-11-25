<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    function product()
    {
    	return view('producs.product');
    }

    public function single_product_show($slug)
    {
    	$product = Product::where('slug',$slug)->first();
    	if(!is_null($product)){
    		return view('producs.show')->with('products',$product);
    	}else{
    		session()->flash('error','The product is not found is database !!!');
    		return redirect()->route('product');
    	}
    }


}
