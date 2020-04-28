<?php

namespace App\Http\Controllers;

use App\branch;
use App\city;
use App\country;
use DB;
use Illuminate\Http\Request;

class branchcontroller extends Controller
{
    public function index(){
        $branch =branch::all();
        return view('admin.branch.branch',['branch'=>$branch]);
    }

    public function create(){
        $country=country::all();
        return view('admin.branch.c_branch',['country'=>$country]);
    }
    public function show($id){
        $city=city::where('country_id',$id)->paginate(10);
        $counrty =country::all();
        $name =country::find($id);
        return view('admin.city.show_all',['city'=>$city,'counrty'=>$counrty,'name'=>$name]);
    }


    function add(Request $request){

        $this->validate($request,
            [
                'name'=>'required|unique:branches',

            ]);

        $test=new branch();
        $test->name=$request->name;
        $test->phone=$request->ph;
        $test->email=$request->email;
        $test->address=$request->address;
        $test->country_id=$request->country_id;
        $test->city_id=$request->state;
        $test->district_id=$request->city;


        if($test->save()){
            session()->flash("success","تمت الاضافه بنجاح  ");
            return back();
        }
    }
    function update(Request $request,$id){

        $this->validate($request,
            [
                'name'=>'required|max:191',
                'country'=>'required',

            ]);
        $test=city::find($id);
        $test->name=$request->name;
        $test->country_id =$request->country;

        if($test->save()){
            session()->flash("success","تم التعديل بنجاح  ");
            return back();
        }


    }
    function delete($id){
        $test=city::find($id);
        $test->delete();
        return back();

    }
    function notactive($id){
        $test=city::find($id);
        $test->active=0;
        $test->save();
        return back();

    }
    function active($id){
        $test=city::find($id);
        $test->active=1;
        $test->save();
        return back();

    }

    public function getStateList(Request $request,$id)
    {
        $states = city::where("country_id",$id)
            ->pluck("name","id");
        return response()->json($states);
    }

    public function getCityList(Request $request,$id)
    {
        $cities = DB::table("districts")
            ->where("city_id",$id)
            ->pluck("name","id");
        return response()->json($cities);
    }
}
