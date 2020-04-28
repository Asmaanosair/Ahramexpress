<?php

namespace App\Http\Controllers;

use App\city;
use App\distance;
use App\district;
use Illuminate\Http\Request;

class distancecontroller extends Controller
{
    public function index(){
        $distance=distance::all();
        $city=city::all()->where('active',1);
        return view('admin.distance.show_all',['distance'=>$distance,'city'=>$city]);
    }


    function add(Request $request){

        $this->validate($request,
            [
                'name'=>'required|unique:distances|max:191',
                'price'=>'required|max:191',


            ]);
        $test=new distance();
        $test->name=$request->name;

        $test->price=$request->price;



        if($test->save()){
            session()->flash("success","تمت الاضافه بنجاح  ");

            return back();
        }

    }
    function update(Request $request,$id){

        $this->validate($request,
            [

                'name'=>'required|max:191',
                'price'=>'required|max:191',

            ]);
        $test=distance::find($id);
        $test->name=$request->name;

        $test->price=$request->price;






        if($test->save()){
            session()->flash("success","تم التعديل بنجاح  ");
            return back();
        }

    }
    function delete($id){

        $test=distance::find($id);
        $test->delete();
        return back();

    }
}
