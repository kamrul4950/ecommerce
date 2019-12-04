<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Division;

class DivisionController extends Controller
{
    public function index()
    {
    	$division = Division::orderBy('priority','asc')->paginate(6);
    	return view('admin.pages.division.division')->with('divisions',$division);
    }

    public function create()
    {
    	return view('admin.pages.division.division_create');
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
    		'name'=>'required',
    		'priority' => 'required',
    	],
    	[
    		'name'=>'Please Provide A Division Name',
    		'priority.required' => 'Please Provide A Division Priority',
    	]);

    	$division = new Division;
    	$division->name = $request->name;
    	$division->priority = $request->priority;
    	$division->save();

    	session()->flash('success','Division Created is successfully.!!');
    	return redirect()->route('admin.division');
    }

    public function edit($id)
    {
    	$division = Division::find($id);
    	if(!is_null($division)){
    		return view('admin.pages.division.division_edit',compact('division'));
    	}else{
    		return redirect()->route('admin.division');
    	}
    }

    public function update(Request $request , $id)
    {
    	$this->validate($request,[
    		'name'=>'required',
    		'priority' => 'required',
    	],
    	[
    		'name'=>'Please Provide A Division Name',
    		'priority.required' => 'Please Provide A Division Priority',
    	]);

    	$division = Division::find($id);
    	$division->name = $request->name;
    	$division->priority = $request->priority;
    	$division->save();

    	session()->flash('success','This Division is Upadeted..!!');
    	return redirect()->route('admin.division');
    }

    public function delete($id)
    {
    	$division = Division::find($id);
    	if(!is_null($division)){
    		$division->delete();
    	}
    	session()->flash('error','This Division Deleted Successed..!!');
    	return redirect()->route('admin.division');
    }
}
