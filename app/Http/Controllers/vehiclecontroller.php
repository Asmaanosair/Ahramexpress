<?php

namespace App\Http\Controllers;

use App\vehicle;
use Illuminate\Http\Request;

class vehiclecontroller extends Controller
{
    public function index(){
        $vehicle=vehicle::all();
        return view('admin.vehicle.show_all',['vehicle'=>$vehicle]);
    }


    function add(Request $request){

        $this->validate($request,
            [
                'name'=>'required|unique:services|max:191',
                'price'=>'required|max:191',


            ]);
        $test=new vehicle();
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
        $test=vehicle::find($id);
        $test->name=$request->name;

        $test->price=$request->price;






        if($test->save()){
            session()->flash("success","تم التعديل بنجاح  ");
            return back();
        }

    }
    function delete($id){

        $test=vehicle::find($id);
        $test->delete();
        return back();

    }
}
