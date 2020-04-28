<?php

namespace App\Http\Controllers;

use App\weight;
use Illuminate\Http\Request;

class weightcontroller extends Controller
{
    public function index(){
        $weight=weight::all();
        return view('admin.weight.show_all',['weight'=>$weight]);
    }


    function add(Request $request){

        $this->validate($request,
            [
                'name'=>'required|unique:services|max:191',
                'price'=>'required|max:191',


            ]);
        $test=new weight();
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
        $test=weight::find($id);
        $test->name=$request->name;

        $test->price=$request->price;






        if($test->save()){
            session()->flash("success","تم التعديل بنجاح  ");
            return back();
        }

    }
    function delete($id){

        $test=weight::find($id);
        $test->delete();
        return back();

    }

}
