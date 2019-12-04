<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use Image;
use File;

class BrandController extends Controller
{
    public function index()
    {
    	$brand = Brand::orderBy('id','desc')->paginate(6);
    	return view('admin.pages.brand')->with('brands',$brand);
    }

    public function create()
    {
    	return view('admin.pages.brand_create');
    }
    //Brand store start here
    public function store(Request $request)
    {
    	//Form validation strat here
    	$this->validate($request,[
    		'name'=>'required',
    		'image'=>'nullable|image',
    		],
    		[
    			'name.required'=>'Please Provide Brand Name .',
    			'image.image'=>'Image Must be JPG, JPEG, PNG, GIF Extension',
    		
    	]);//Form validation end here

    	$brand = new Brand;
    	$brand->name = $request->name;
    	$brand->description = $request->description;

    	if($request->hasFile('image')){
    		$image = $request->file('image');
    		$img = time().'.'.$image->getClientOriginalExtension();
    		$location = public_path('images/brand_image/'.$img);
    		Image::make($image)->save($location);
    		$brand->image = $img;
    	}
    	$brand->save();
    	session()->flash('success',$brand->name. ' Brand Create Successfully..!!');
    	return redirect()->route('admin.brands');
    }//Brand store end here

    //Brand Edit + Show create form show data start here
    public function edit($id)
    {
    	$brand = Brand::find($id);
    	if(!is_null($brand)){
    		return view('admin.pages.brand_edit')->with('brands',$brand);
    	}else{
    		return redirect()->route('admin.brands');
    	}
    }//Brand Edit end here

    //Brand section Update method start here
    public function update(Request $request,$id)
    {
    	$this->validate($request,[
    		'name'=>'required',
    		'image'=>'nullable|image',
    	],
    	[
    		'name.required'=>'Please valid name provide',
    		'image.image'=>'Image must be JPEG, JPG, PNG, GIF Extension..',
    	]);

    	$brand = Brand::find($id);
    	$brand->name = $request->name;
    	$brand->description = $request->description;

    	if($request->hasFile('image')){

    		if(File::exists('images/brand_image/'.$brand->image)){
    			File::delete('images/brand_image/'.$brand->image);
    		}

    		$image = $request->file('image');
    		$img = time().'.'.$image->getClientOriginalExtension();
    		$location = public_path('images/brand_image/'.$img);
    		Image::make($image)->save($location);
    		$brand->image = $img;
    	}

    	$brand->save();
    	session()->flash('success',$brand->name.' Brand Updated Successfully..!!');
    	return redirect()->route('admin.brands');

    }//Brand section Update metho End here

    public function delete($id)
    {
    	$brand = Brand::find($id);
    	if(!is_null($brand)){
    		if(File::exists('images/brand_image/'.$brand->image)){
    			File::delete('images/brand_image/'.$brand->image);
    		}

    		$brand->delete();
    	}
    	session()->flash('error',$brand->name.'Brand has been Delete Successed..!!');
    	return redirect()->route('admin.brands');

    }
}

