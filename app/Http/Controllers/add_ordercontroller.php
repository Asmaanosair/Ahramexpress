<?php

namespace App\Http\Controllers;

use App\country;
use Illuminate\Http\Request;

class add_ordercontroller extends Controller
{
    public function index(){
        $add_order=add_order::paginate(10);
        return view('admin.add_order.show_all',['add_order'=>$add_order]);
    }


    function add(Request $request){

        $this->validate($request,
            [
                'user_id'=>'required|unique:orders',
            ]);
        $user_id=explode(',',$request->user_id);
        foreach ($user_id as $row) {
            $test = new add_order();
            $test->user_id =$row;
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

            ]);
        $test=add_order::find($id);
        $test->name=$request->name;

        if($test->save()){
            session()->flash("success","تم التعديل بنجاح  ");
            return back();
        }

    }
    function delete($id){
        $test=add_order::find($id);
        $test->delete();
        return back();

    }

}
