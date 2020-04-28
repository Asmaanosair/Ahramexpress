<?php

namespace App\Http\Controllers;

use App\receive;
use Illuminate\Http\Request;

class receivecontroller extends Controller
{
    public function index(){
        $receive=receive::all();
        return view('admin.receive.show_all',['receive'=>$receive]);
    }


    function add(Request $request){

        $this->validate($request,
            [
                'name'=>'required|unique:receives|max:191',



            ]);
        $test=new receive();
        $test->name=$request->name;





        if($test->save()){
            session()->flash("success","تمت الاضافه بنجاح  ");

            return back();
        }

    }
    function update(Request $request,$id){

        $this->validate($request,
            [

                'name'=>'required|max:191',


            ]);
        $test=receive::find($id);
        $test->name=$request->name;




        if($test->save()){
            session()->flash("success","تم التعديل بنجاح  ");
            return back();
        }

    }
    function delete($id){

        $test=receive::find($id);
        $test->delete();
        return back();

    }

}
