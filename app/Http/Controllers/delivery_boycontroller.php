<?php

namespace App\Http\Controllers;

use App\delivery_boy;
use App\status;
use App\sub_order;
use App\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class delivery_boycontroller extends Controller
{
    public function index(){
        $boy=delivery_boy::all();
        return view('admin.delivery_boy.boys',['boy'=>$boy]);
    }


    function add(Request $request){

        $this->validate($request,
            [
                'name' => 'required',
                'email' => 'unique:delivery_boys',
                'password' => 'required',
                'code' => 'integer',


            ]);
        $test=new delivery_boy();
        $test->name=$request->name;
        $test->phone=$request->ph;
        $test->address=$request->address;
        $test->password=Hash::make($request['password']);
        $test->email=$request->email;
        $test->number=$request->code;
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
        $test=delivery_boy::find($id);
        $test->name=$request->name;








        if($test->save()){
            session()->flash("success","تم التعديل بنجاح  ");
            return back();
        }

    }
    function delete($id){

        $test=delivery_boy::find($id);
        $test->delete();
        return back();

    }

    function create(){

        return view('admin.delivery_boy.c_boy');
    }

    function singl_boy($id=null){
        $client=delivery_boy::find($id);
        $status=status::all();
        return view('admin.delivery_boy.single_boy',['client'=>$client,'status'=>$status]);
    }

    function active_boy($id=null){
        $boy=delivery_boy::find($id);
        $boy->status=1;
        $boy->save();
        return back();


    }

    function not_active_boy($id=null){
        $boy=delivery_boy::find($id);
        $boy->status=0;
        $boy->save();
        return back();


    }

    function status($id,$status){
        $boy=delivery_boy::find($id);
        $order=order::where('status_id',$status)->where('delivery_boy_id',$id)->get();
        return view('admin.delivery_boy.order_boy',['order'=>$order,'boy'=>$boy]);


    }

    function sub_order($id){
        $boy=delivery_boy::find($id);
        $order=sub_order::where('delivery_boy_id',$id)->get();
        return view('admin.delivery_boy.sub_order',['order'=>$order,'boy'=>$boy]);


    }
    function order($id){
        $boy=delivery_boy::find($id);
        $order=order::where('delivery_boy_id',$id)->get();
        return view('admin.delivery_boy.order',['order'=>$order,'boy'=>$boy]);


    }


}
