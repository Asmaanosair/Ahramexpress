<?php

namespace App\Http\Controllers;

use App\option;
use Illuminate\Http\Request;

class optioncontroller extends Controller
{
    public function index(){
        $option=option::all();
        return view('admin.option.show_all',['option'=>$option]);
    }

    function add(Request $request){

        $this->validate($request,
            [
                'name'=>'required|unique:services|max:191',
                'price'=>'required|max:191',

                'image'=>'mimes:jpeg,bmp,png',
            ]);
        $test=new option();
        $test->name=$request->name;
        $test->des=$request->des;
        $test->price=$request->price;

        if($request->file('image') !=null)
        {
            $filname1=time().".".$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('img',$filname1);
            $test->img=$filname1;
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
                'price'=>'required|max:191',

                'image'=>'mimes:jpeg,bmp,png',


            ]);
        $test=option::find($id);
        $test->name=$request->name;
        $test->des=$request->des;
        $test->price=$request->price;


        if($request->file('image') !=null)
        {
            $filname1=time().".".$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('img',$filname1);
            $test->img=$filname1;
        }




        if($test->save()){
            session()->flash("success","تم التعديل بنجاح  ");
            return back();
        }

    }
    function delete($id){

        $test=option::find($id);
        $test->delete();
        return back();

    }

}
