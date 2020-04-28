<?php

namespace App\Http\Controllers;

use App\city;
use App\country;
use App\district;
use App\order;
use App\service;
use App\status;
use App\vehicle;
use App\history_order;

use Illuminate\Http\Request;

class ordercontroller extends Controller
{
    public function index(){
        $order=order::all();
        return view('admin.order.order',['order'=>$order]);
    }

 public function pdf_order(){
        $order=order::all();
        return view('admin.order.pdf_order',['order'=>$order]);
    }

    function add(Request $request,$id){
        $city=city::all();
        $country=country::all();
        $dist=district::all();
        $service=service::all();
        $status=status::all();
        $test=new order();
        $test->amount=$request->amount;
        $test->number=$request->numb;
        $test->vehicle_id=$request->vehicl;
        $test->client_id=$id;
        $test->status_id=$request->status_id;
        $test->r_date=$request->r_date;
        $test->note=$request->note;
        $test->track_num=rand('11111','9999999');

        if($test->save()){
            session()->flash("success","تمت الاضافه بنجاح  ");
            $test_number=$test->number;
            $order_id=$test->id;

            return view('admin.order.c_order',['test_number'=>$test_number,
                'service'=>$service,'city'=>$city,'country'=>$country,'dist'=>$dist,'order_id'=>$order_id,'status'=>$status]);
        }

    }

    function update(Request $request,$id){

        $test= order::find($id);
        $test->number=$request->numb;
        $test->vehicle_id=$request->vehicl;

        $test->status=$request->status;
        $test->r_date=$request->r_date;
        $test->note=$request->note;


        if($test->save()){
            session()->flash("success","تم التعديل بنجاح بنجاح  ");


            return  back();
        }

    }
     function up_order_status_boy(Request $request,$id){
        $test=order::find($id);
        $test->delivery_boy_id=$request->boy;
        $test->status_id=$request->status;
        if($test->save()){
            $history=new history_order();
            $history->delivery_boy_id=$request->boy;
            $history->status_id=$request->status;
            $history->order_id=$id;
            date_default_timezone_set('Africa/Cairo');
            $date=date("d-M-Y // h:i:sa");
            $history->history=$date;
            $history->save();
            session()->flash("success","تم التعديل بنجاح  ");
            return back();

        }

    }
    function history_order($id){
        $track=order::find($id);
        $order=history_order::where('order_id',$id)->get();
        return view('admin.order.history_order',['order'=>$order,'track'=>$track]);
    }

    function edit($id){
        $order=order::find($id);
        $vehicl=vehicle::all();
        $status=status::all();

       return view('admin.order.e_order',['order'=>$order,'vehicl'=>$vehicl,'status'=>$status]);

    }
}
