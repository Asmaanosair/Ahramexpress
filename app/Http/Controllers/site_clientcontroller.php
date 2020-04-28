<?php

namespace App\Http\Controllers;

use App\account;
use App\bank;
use App\city;
use App\client;
use App\country;
use App\district;
use App\Exports\exportorder;
use App\order;
use App\service;
use App\sub_order;
use App\vehicle;
use Illuminate\Http\Request;
use Excel;
use Auth;
use DB;

class site_clientcontroller extends Controller
{
    public function index(){
        $id=Auth::guard('client')->user()->id;
        $client=client::find($id);
        $bank=bank::where('client_id',$id)->first();
        $account=account::where('client_id',$id)->first();
        $country=country::all();
          $find=account::where('client_id',$id)->first();
              $find2=bank::where('client_id',$id)->first();
        return view('site.client.profile',['id'=>$id,'client'=>$client,'bank'=>$bank,'account'=>$account,'country'=>$country,'find'=>$find,'find2'=>$find2]);
    }

    public function dashboard(){
        $id=Auth::guard('client')->user()->id;
       $num=count(order::where('client_id',$id)->get());
        return view('site.client.dashboard',['num'=>$num]);
    }
    
    
     
      

    public function pick_up(){
        $id=Auth::guard('client')->user()->id;
        $num=order::where('client_id',$id)->get();
        return view('site.client.pick_up',['num'=>$num]);
    }

    public function cargo(){
        $id=Auth::guard('client')->user()->id;
        $num=order::where('client_id',$id)->get();
       
    foreach ($num as $order){
            $data=sub_order::where('order_id',$order->id)->get();
            return view('site.client.cargo',['data'=>$data]);
        }
    //      $data=[];
     return view('site.client.cargo',['data'=>$data]);



    }

    public function order_system(){
        $veh=vehicle::all();

            return view('site.client.order_system',['veh'=>$veh]);
        }

    public function order_system_sec(){
        $veh=vehicle::all();
        $city=city::all();
        $country=country::all();
        $district=district::all();
        $service=service::all();
        return view('site.client.order_system_sec',['veh'=>$veh,'district'=>$district,'city'=>$city,'country'=>$country,'service'=>$service]);
    }
    public function order_system_add(Request $request){
        $this->validate($request,
            [
                'number' => 'required',
                'total' => 'required',
            ]);
        $id=Auth::guard('client')->user()->id;
        $test=new order();
        $test->amount=$request->total;
        $test->number=$request->number;
        $test->vehicle_id=$request->veh;
        $test->client_id=$id;
        $test->r_date=$request->daterange;
        $test->note=$request->note;
        $test->status=$request->stat;
        $test->track_num=rand('11111','9999999');
        if($test->save()){
           return redirect('/order_system_sec')->with('number', $test->number)->with('id',$test->id);
        }
        return back();


    }
    public function getStateList(Request $request)
    {
        $states = DB::table("cities")
            ->where("country_id",$request->country_id)
            ->pluck("name","id");
        return response()->json($states);
    }

    public function getCityList(Request $request)
    {
        $cities = DB::table("districts")
            ->where("city_id",$request->state_id)
            ->pluck("name","id");
        return response()->json($cities);
    }
    public function order_system_add_sec(Request $request){
        $this->validate($request,
            [

            ]);
        $id=Auth::guard('client')->user()->id;
        $test=new sub_order();

       // `id`, `name`, `phone`, `address`, `t_date`, `total`, `shipping_fees`, `track_number`,
       // `delivery_note`, `order_note`, `city_id`, `country_id`, `service_id`, `delivery_boy_id`, `district_id`,
      //  `status_id`, `created_at`, `updated_at`, `order_id`, `phone1`, `land`, `invoice`, `email`SELECT * FROM `sub_orders` WHERE 1
        $test->name=$request->name;
        $test->phone=$request->phone;
        $test->phone1=$request->phone1;
        $test->city_id=$request->state;
        $test->district_id=$request->city;
        $test->country_id=$request->country_id;
         $test->service_id=$request->service;
        $test->t_date=$request->daterange;
        $test->order_note=$request->note;
        $test->type=$request->type;
        $test->stat=$request->stat;
        $test->shipping_fees=$request->shipping;
        $test->total=$request->total;
        $test->invoice=$request->feez;
        $test->land=$request->land_mark;
        $test->address=$request->address;
        $test->order_id=$request->id;
        $test->track_number=rand('11111','9999999');
        if($test->save()){
if($request->number-$request->i==0){

    return redirect('/pick_up');
}else {

    return redirect('/order_system_sec')->with('number', $request->number - $request->i)->with('id', $request->id)->with('success', "تمت الاضافه بنجاح");
}
        }
        return back()->with('number', $request->number)->with('id',$request->id);



    }
    function  update_information(Request $request ){
        $this->validate($request,
            [
                'name'=>'max:191',
                'phone'=>'max:191',
                'state'=>'numeric',
                'city'=>'numeric',
                'country_id'=>'numeric',
                'email'=>'max:191',
                'company'=>'max:191',
                'address'=>'max:191',

            ]);
        $id=$request->id;
        $test=client::find($id);
        $test->name=$request->name;
        $test->phone=$request->phone;

        $test->city_id=$request->state;
        $test->district_id=$request->city;
        $test->country_id=$request->country_id;
        $test->company=$request->company;
        $test->address=$request->address;
        if($test->save()){
            return redirect('/client_account')->with('success', " تم التعديل  بنجاح");

        }
    }
        
         function add_image(Request $request){
 $id=$request->id;
        $attach=client::find($id)->attach;
        $images=explode(',',$attach);
        $test=client::find($id);
        if (!empty($request->file('image'))) {
            $files2 = [];
            foreach ($request->file('image') as $media) {
                if (!empty($media)) {
                    $destinationPath = 'img';
                    $filename2 = $media->getClientOriginalName();
                    $media->move($destinationPath, $filename2);
                    $files2[] = $filename2;
                }
            }
            $newimages=array_filter(array_merge($files2,$images));


            $test->attach=implode(',',$newimages);
        }
        if($test->save()){
            session()->flash("success","تمت الاضافه بنجاح  ");

            return back();
        }
    }
    
     function add_other(Request $request){
 $id=$request->id;
        $attach=client::find($id)->other;
        $images=explode(',',$attach);
        $test=client::find($id);
        if (!empty($request->file('image'))) {
            $files2 = [];
            foreach ($request->file('image') as $media) {
                if (!empty($media)) {
                    $destinationPath = 'img';
                    $filename2 = $media->getClientOriginalName();
                    $media->move($destinationPath, $filename2);
                    $files2[] = $filename2;
                }
            }
            $newimages=array_filter(array_merge($files2,$images));


            $test->other=implode(',',$newimages);
        }
        if($test->save()){
            session()->flash("success","تمت الاضافه بنجاح  ");

            return back();
        }
    }
    
        function add_account(Request $request){
           $id=$request->id;
            $find=account::where('client_id',$id)->first();
              $find2=bank::where('client_id',$id)->first();
            if(count($find)==0){
                $test3=new account();
                $test3->name=$request->name1;
                $test3->number=$request->number;
                $test3->vf=$request->vf;
                $test3->et=$request->et;
                $test3->orang=$request->orang;
                $test3->client_id=$id;
                $test3->save();
            }else{
                 $test3=account::where('client_id',$id)->first();
                $test3->name=$request->name1;
                $test3->number=$request->number;
                $test3->vf=$request->vf;
                $test3->et=$request->et;
                $test3->orang=$request->orang;
                $test3->client_id=$id;
                $test3->save();
                
            }
             if(count($find)==0){
                
        $test2=new bank();
        $test2->bank=$request->bank;
        $test2->username=$request->name;
       // $test2->address=$request->address2;
        $test2->account=$request->account;
        $test2->client_id=$id;
        $test2->save();
           
        
    }else{
        $test2=bank::where('client_id',$id)->first();
        $test2->bank=$request->bank;
        $test2->username=$request->name2;
        $test2->address=$request->address2;
        $test2->account=$request->account;
        $test2->client_id=$id;
        $test2->save();
        
    }
     session()->flash("success","تمت الاضافه بنجاح  ");

            return back();
        }

    
    public function export()
    {
        return Excel::download(new exportorder(), 'orders.xlsx');
    }
    public function import()
    {
        Excel::import(new exportorder, request()->file('file'));

        return back();
    }
    
     public function myaccountpackage(){
      
        return view('site.client.my-account-package');
    }
      public function cargo2($id){
        $data=sub_order::where('order_id',$id)->get();
       return view('site.client.cargo',['data'=>$data]);



    }
    
      public function invoice($id){
          $order=order::find($id);
        $data=sub_order::where('order_id',$id)->get();
       return view('site.client.invoice',['data'=>$data,'order'=>$order]);



    }

}
