<?php

namespace App\Http\Controllers;

use App\role;
use Illuminate\Http\Request;

class rolecontroller extends Controller
{
    public function index(){
        $role=role::all();
        return view('admin.role.role',['role'=>$role]);
    }

    function add(Request $request){

        $this->validate($request,
            [
                'name'=>'required|unique:roles|max:191',

            ]);
        $test=new role();
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
        $test=role::find($id);
        $test->name=$request->name;








        if($test->save()){
            session()->flash("success","تم التعديل بنجاح  ");
            return back();
        }

    }
    function delete($id){
        $test=role::find($id);
        $test->delete();
        return back();
    }

}
