<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Product;
use App\ProductImage;
use Image;
use File;
class AdminPageController extends Controller
{
    function product_create()
     {
     	return view('admin.pages.productInsert');
     }

     public function all_products()
     {
      $product = Product::orderBy('id','desc')->get();
      return view('admin.pages.allproduct')->with('products',$product);
     }

     public function product_edit($id)
     {
        $product = Product::find($id);
        return view('admin.pages.product_edit')->with('products',$product);
     }

     function product_store(Request $request)
     {

          $validated = $request->validate([

             'title' => 'required|max:155',
             'description' => 'required',
             'price'=> 'required|numeric',
             'quantity'=>'required|numeric',
             'category_id'=>'required|numeric',
             'brand_id'=>'required|numeric',
             'product_image'=>'required',

         ]);


     	$product = new Product;
     	$product->title 		= $request->title;
     	$product->price 		= $request->price;
     	$product->quantity 		= $request->quantity;
     	$product->description 	= $request->description;

     	$product->slug 		= Str::slug($request->title);

     	$product->category_id	= $request->category_id;
     	$product->brand_id		= $request->brand_id;
     	$product->admin_id		= 1;
     	$product->save();


          /*
               Single Product image uploaded process
                    if($request->hasFile('product_image')){

               $image    = $request->file('product_image');
               $img      = time().'.'.$image->getClientOriginalExtension();
               $location = public_path('images/products/'. $img);
               Image::make($image)->save($location);

               $product_image                = new ProductImage;
               $product_image->product_id    = $product->id;
               $product_image->image         = $img;
               $product_image->save();
               
          } //single product process end here 

          */
        if($request->hasFile('product_image')){
          foreach ($request->product_image as $image) {
           $img =time().'.'.$image->getClientOriginalExtension();
           $location = public_path('images/products/'.$img);
           Image::make($image)->save($location);

           $product_image = new ProductImage;
           $product_image->product_id = $product->id;
           $product_image->image = $img;
           $product_image->save();
          }

        }
   

      session()->flash('success','Product Add Successfuly..!!');
     	return redirect()->route('admin.product.create');
     }


     function product_update(Request $request,$id)
     {

          $validated = $request->validate([

             'title' => 'required|max:155',
             'description' => 'required',
             'price'=> 'required|numeric',
             'quantity'=>'required|numeric',
             'category_id'=>'required|numeric',
             'brand_id'=>'required|numeric',
             'product_image'=>'required',

         ]);


      $product = Product::find($id);
      $product->title     = $request->title;
      $product->price     = $request->price;
      $product->quantity    = $request->quantity;
      $product->description   = $request->description;
      $product->category_id   = $request->category_id;
      $product->brand_id      = $request->brand_id;
      $product->save();

      return redirect()->route('admin.product.all');
     } //Product Update process method

     public function product_delete($id){
        $product = Product::find($id);
        if(!is_null($product)){
        $product_image = ProductImage::orderBy('id','desc')->where('product_id',$product->id)->get();
          foreach ($product_image as $image) {
             if(File::exists('images/products/'.$image->image)){
              File::delete('images/products/'.$image->image);
            }
            $image->delete();
          }
          

          $product->delete();
        }
        session()->flash('success','Product delete Successfuly !!');
        return back();
     }
}
