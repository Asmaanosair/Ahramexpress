<?php

namespace App\Http\Controllers;

use App\city;
use App\country;
use App\district;
use App\service;
use App\status;
use App\sub_order;
use App\history_sub_order;
use Illuminate\Http\Request;

class sub_ordercontroller extends Controller
{

    function index(){


        $order=sub_order::all();
        return view('admin.order.sub_order',['order'=>$order]);
    }

    function show_sub($id){


        $order=sub_order::all()->where('order_id',$id);
        return view('admin.client.sub_order',['order'=>$order]);
    }
    function add(Request $request,$id){

        $city=$request->city;
        $country=$request->country;
        $land=$request->land;

        $district=$request->district;
        $service=$request->service;

        $name=$request->name;
        $phone=$request->ph;
        $phone1=$request->ph1;
        $status=$request->status;
        $invoice=$request->invoice;
        $shipping_fees=$request->shipping_fees;
        $email=$request->email;
        $address=$request->address;
        $order_note=$request->des;
        $total=$request->total;
        $t_date=$request->t_date;



        foreach ($city as $key=>$row) {
            $i = 0;
            for ($i; $key >= $i; $i++) {
                $test = new sub_order();
                $test->city_id = $city[$i];
                $test->country_id = $country[$i];
                $test->district_id = $district[$i];
                $test->service_id = $service[$i];
                $test->name = $name[$i];
                $test->order_id = $id;
                $test->phone = $phone[$i];
                $test->phone1 = $phone1[$i];
                $test->land = $land[$i];
                $test->invoice = $invoice[$i];
                $test->shipping_fees = $shipping_fees[$i];
                $test->email = $email[$i];
                $test->status_id = $status[$i];
                $test->address = $address[$i];
                $test->total = $total[$i];
                $test->t_date = $t_date[$i];
                $test->order_note = $order_note[$i];
                $test->track_number=rand('11111','9999999');

            }
            $test->save();

        }

            session()->flash("success","تمت الاضافه بنجاح  ");
            return redirect('/kt_admin/client');










    }
    
        function update(Request $request,$id){

        $city=$request->city;
        $country=$request->country;
        $land=$request->land;

        $district=$request->district;
        $service=$request->service;

        $name=$request->name;
        $phone=$request->ph;
        $phone1=$request->ph1;
        $status=$request->status;
        $invoice=$request->invoice;
        $shipping_fees=$request->shipping_fees;
        $email=$request->email;
        $address=$request->address;
        $order_note=$request->des;
        $total=$request->total;
        $t_date=$request->t_date;



                $test = sub_order::find($id);
                $test->city_id = $city;
                $test->country_id = $country;
                $test->district_id = $district;
                $test->service_id = $service;
                $test->name = $name;
                $test->phone = $phone;
                $test->phone1 = $phone1;
                $test->land = $land;
                $test->invoice = $invoice;
                $test->shipping_fees = $shipping_fees;
                $test->email = $email;
                $test->status_id = $status;
                $test->address = $address;
                $test->total = $total;
                $test->t_date = $t_date;
                $test->order_note = $order_note;
            

          
            $test->save();

        

            session()->flash("success","تمت تعديل بنجاح  ");
            return back();










    }

    function up_sub_order_status_boy(Request $request,$id){
        $test=sub_order::find($id);
        $test->delivery_boy_id=$request->boy;
        $test->status_id=$request->status;
        if($test->save()){
            
              $history=new history_sub_order();
            $history->delivery_boy_id=$request->boy;
            $history->status_id=$request->status;
            $history->sub_order_id=$id;
            date_default_timezone_set('Africa/Cairo');
            $date=date("d-M-Y // h:i:sa");
            $history->history=$date;
            $history->save();
          
            session()->flash("success","تم التعديل بنجاح  ");
            return back();

        }

    }
    
     function history_sub_order($id){
        $track=sub_order::find($id);
        $order=history_sub_order::where('sub_order_id',$id)->get();
        return view('admin.order.history_sub_order',['order'=>$order,'track'=>$track]);
    }

    function edit($id){

        $city=city::all();
        $country=country::all();
        $dist=district::all();
        $service=service::all();
        $status=status::all();
        $order=sub_order::find($id);

        return view('admin.order.e_sub_order',[
            'service'=>$service,'city'=>$city,'country'=>$country,'dist'=>$dist,'status'=>$status,'order'=>$order]);



    }
}
