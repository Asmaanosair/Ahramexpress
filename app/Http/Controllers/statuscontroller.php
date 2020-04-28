<?php

namespace App\Http\Controllers;

use App\status;
use Illuminate\Http\Request;

class statuscontroller extends Controller
{
    public function index(){
        $status=status::all();
        return view('admin.status.status',['status'=>$status]);
    }


    function add(Request $request){

        $this->validate($request,
            [
                'name'=>'required|max:191',



            ]);
        $test=new status();
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
        $test=status::find($id);
        $test->name=$request->name;








        if($test->save()){
            session()->flash("success","تم التعديل بنجاح  ");
            return back();
        }

    }
    function delete($id){

        $test=status::find($id);
        $test->delete();
        return back();

    }
}
