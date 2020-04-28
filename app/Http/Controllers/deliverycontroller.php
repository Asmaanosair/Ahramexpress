<?php

namespace App\Http\Controllers;

use App\delivery;
use App\service;
use Illuminate\Http\Request;

class deliverycontroller extends Controller
{

    public function index(){
        $delivery=delivery::all();
        return view('admin.delivery_types.show_all',['delivery'=>$delivery]);
    }


    function add(Request $request){

        $this->validate($request,
            [
                'name'=>'required|unique:services|max:191',
                'price'=>'required|max:191',


            ]);
        $test=new delivery();
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
        $test=delivery::find($id);
        $test->name=$request->name;

        $test->price=$request->price;






        if($test->save()){
            session()->flash("success","تم التعديل بنجاح  ");
            return back();
        }

    }
    function delete($id){

        $test=delivery::find($id);
        $test->delete();
        return back();

    }

}
