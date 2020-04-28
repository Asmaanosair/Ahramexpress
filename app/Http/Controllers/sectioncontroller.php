<?php

namespace App\Http\Controllers;

use App\option;
use App\section;
use Illuminate\Http\Request;

class sectioncontroller extends Controller
{
    public function index(){
        $option1 =option::all();
        $option =option::paginate(10);
        return view('admin.section.option',['option'=>$option,'option1'=>$option1]);
    }
    public function show($id){
        $section=section::where('option_id',$id)->paginate(10);
        $option =option::all();
        $name =option::find($id);
        return view('admin.section.show_all',['section'=>$section,'option'=>$option,'name'=>$name]);
    }


    function add(Request $request){

        $this->validate($request,
            [
                'name'=>'required|unique:sections',
                'option'=>'required',
                'price'=>'required',
            ]);
        $name=explode(',',$request->name);
        foreach ($name as $row) {
            $test = new section();
            $test->name =$row;
            $test->price =$request->price;
            $test->option_id =$request->option;
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
                'option'=>'required',
                'price'=>'required',

            ]);
        $test=section::find($id);
        $test->name=$request->name;
        $test->price =$request->price;
        $test->option_id =$request->option;

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
