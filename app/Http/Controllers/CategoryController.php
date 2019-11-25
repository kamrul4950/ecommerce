<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Image;
use File;

class CategoryController extends Controller
{
    public function index()
    {
    	$category = Category::orderBy('id','desc')->paginate(4);
    	return view('admin.pages.category')->with('categorys',$category);
    }//Category show method

    public function category_create()
    {
    	$main_category = Category::orderBy('name','desc')->where('parent_id',NULL)->get();
    	return view("admin.pages.category_create")->with('main_category',$main_category);
    }//Category create method

    public function category_store(Request $request)
    {
    		 $this->validate($request, [
    		'name' => 'required',
    		'image' => 'nullable|image',
    	],
    	[
    		'name.required'=>'Please provide a category name.',
    		'image.image' => 'Image Must be jpeg,PNG,jpg,gif extension.',
    	]);

    	$category = new Category;
    	$category->name = $request->name;
    	$category->description = $request->description;
    	$category->parent_id = $request->parent_id;

    	if($request->hasFile('image')){
    		$image    = $request->file('image');
            $img      = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/category_image/'. $img);
            Image::make($image)->save($location);
    		$category->image = $img;

    	}

    	$category->save();
    	session()->flash('success','A new category has a successfuly add..');
    	return redirect()->route('admin.category');
    }//category stored method

    public function category_edit($id)
    {
    	$main_category = Category::orderBy('name','desc')->where('parent_id',NULL)->get();
    	$categorys = Category::find($id);
    	if(!is_null($categorys))
    	{
    		return view('admin.pages.category_edit',compact('categorys','main_category'));
    	}else{
    		return redirect()->route('admin.category');
    	}
    	
    }//category edit and show edit form date

    public function category_update(Request $request,$id)
    {
    	$this->validate($request, [
    		'name' => 'required',
    		'image' => 'nullable|image',
    	],
    	[
    		'name.required'=>'Please provide a category name.',
    		'image.image' => 'Image Must be jpeg,PNG,jpg,gif extension.',
    	]);

    	$category = Category::find($id);
    	$category->name = $request->name;
    	$category->description = $request->description;
    	$category->parent->id = $request->parent_id;

    	if($request->hasFile('image')){

    		if(File::exists('images/category_image/'.$category->image)){
    			File::delete('images/category_image/'.$category->image);
    		}

    		$image = $request->file('image');
    		$img =time().'.'. $image->getClientOriginalExtension();
    		$location = public_path('images/category_image/'.$img);
    		Image::make($image)->save($location);
    		$category->image =$img;
    	}
    	$category->save();
    	session()->flash('success','Category update successfuly..!');

    	return redirect()->route('admin.category');
    } //category edit and update metho end here

    public function category_delete($id)
    {
    	$category = Category::find($id);
    	if(!is_null($category)){

    		if($category->parent_id == NULL){
    			$sub_category = Category::orderBy('id','desc')->where('parent_id',$category->id)->get();
    			foreach ($sub_category as $sub_cat){
    				
    				if(File::exists('images/category_image/'.$sub_cat->image)){
    			File::delete('images/category_image/'.$sub_cat->image);
    		}
    				$sub_cat->delete();
    			}

    		}
    		if(File::exists('images/category_image/'.$category->image)){
    			File::delete('images/category_image/'.$category->image);
    		}

    		$category->delete();
    	}
    	session()->flash('error','Category delete successfuly..!');
    	return redirect()->route('admin.category');

    }//category delete method end here


}
