<?php

namespace App\Http\Controllers;

use App\service;

use Illuminate\Http\Request;
class servicecontroller extends Controller
{
    public function index(){
        $service=service::all();
        return view('admin.services.show_all',['service'=>$service]);
    }

    function add(Request $request){

        $this->validate($request,
            [
                'name'=>'required|unique:services|max:191',
                'price'=>'required|max:191',

                'image'=>'mimes:jpeg,bmp,png',
            ]);
        $test=new service();
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
        $test=service::find($id);
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
        $test=service::find($id);
        $test->delete();
        return back();
    }

}
