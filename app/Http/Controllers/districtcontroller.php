<?php

namespace App\Http\Controllers;

use App\city;
use App\district;
use Illuminate\Http\Request;

class districtcontroller extends Controller
{
    public function index(){
        $city1 =city::all();
        $city =city::paginate(10);
        return view('admin.district.city',['city'=>$city,'city1'=>$city1]);
    }
    public function show($id){
        $district=district::where('city_id',$id)->paginate(10);
        $city =city::all();
        $name =city::find($id);
        return view('admin.district.show_all',['district'=>$district,'city'=>$city,'name'=>$name]);
    }


    function add(Request $request){

        $this->validate($request,
            [
                'name'=>'required|unique:districts',
                'city'=>'required',
            ]);
        $name=explode(',',$request->name);
        foreach ($name as $row) {
            $test = new district();
            $test->name =$row;
            $test->city_id =$request->city;
            $test->save();
        }

        if($test->save()){
            session()->flash("success","تمت الاضافه بنجاح  ");
            return back();
        }
    }
    function update(Request $request,$id){

        $this->validate($request,
            [
                'name'=>'required|max:191',
                'city'=>'required',

            ]);
        $test=district::find($id);
        $test->name=$request->name;
        $test->city_id =$request->city;

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
}
