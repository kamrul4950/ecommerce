<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Division;
use App\Disrict;

class DisrictController extends Controller
{
    public function index()
    {
    	$districts = Disrict::orderBy('name','asc')->paginate(6);
    	return view('admin.pages.district.district',compact('districts'));
    }

    public function create()
    {	
    	$divisions = Division::orderBy('priority','asc')->get();
    	return view('admin.pages.district.district_create',compact('divisions'));
    }
    public function store(Request $request)
    {
    	$this->validate($request,[
    		'name'=>'required',
    		'division_id'=> 'required',
    	],
    	[
    		'name'=>'Please Provide A District Name',
    		'division_id.required'=>'Please must be selecte a division name',
    	]);

    	$district = new Disrict;
    	$district->name = $request->name;
    	$district->division_id = $request->division_id;
    	$district->save();

    	session()->flash('success',$district->name .'District Successfully Created..!');
        return redirect()->route('admin.district');
    }

    public function edit($id)
    {
        $divisions = Division::orderBy('priority','asc')->get();
        $district = Disrict::find($id);
        if(!is_null($district)){
            return view('admin.pages.district.district_edit',compact('district','divisions'));
        }else{
            return redirect()->route('admin.district');
        }
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'name'=>'required',
            'division_id'=> 'required',
        ],
        [
            'name'=>'Please Provide A District Name',
            'division_id.required'=>'Please must be selecte a division name',
        ]);

        $district = Disrict::find($id);
        $district->name = $request->name;
        $district->division_id = $request->division_id;
        $district->save();

        session()->flash('success',$district->name .' District Successfully Updated..!');
        return redirect()->route('admin.district');
    }

    public function delete($id)
    {
        $district = Disrict::find($id);
        if(!is_null($district)){
            $district->delete();
        }
        session()->flash('error',$district->name.' District Deleted Successed..!!');
        return redirect()->route('admin.district');
    }
}
