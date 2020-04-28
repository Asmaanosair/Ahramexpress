<?php

namespace App\Http\Controllers\API_Controllers;

use App\delivery_boy;
use App\order;
use App\sub_order;
use http\Client\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;
use Str;





class delivery_boycontroller extends Controller
{
//    public function index(){
//
//        $test=delivery_boy::all();
//         return response()->json($test,200);
//
//    }
//
//
//    public function add(Request $request){
//        $test=delivery_boy::create($request->all());
//        return response()->json($test,201);
//
//    }
//
//    public function update(Request $request , delivery_boy $boy){
//        $boy->update($request->all());
//        return response()->json($boy,200);
//
//    }

//    public function login_delivery_boy(Request $request){
//        $validatedData =[
//            'phone'=>'required|min:11|numeric|regex:/^([0-9\s\-\+\(\)]*)$/',
//            'password'=>'required'
//        ];
//        $validation=Validator::make($request->all(),$validatedData);
//        if($validation->fails()){
//            $error=$validation->errors();
//            return response()->json([
//                'code' => '0',
//                'status' => 'error',
//                'error_message'=>$error
//            ], 200);
//        }else{
//
//        }
//
//
//
//
//
//    }
    public function login_delivery_boy(Request $request){
        if(Auth::guard('delivery_boy')->attempt(['phone'=>$request->phone,'password'=>$request->password,'status'=>'1'])){
            $take['Api_token']=Str::random(60);
            $user = Auth::guard('delivery_boy')->user();
            $user->api_token =$take['Api_token'];
            $user->save();

            return response()->json([
            'code' => '1',
            'status' => 'success',
            'data'=>$user,

        ], 200);
    }
        else{
            return response()->json([
                'code' => '0',
                'status' => 'error',
                'error_message'=>"من فضلك تاكد من رقم الموبايل والباسورد الخاص بك "
            ], 200);
        }
    }


    public function delivery_boy(Request $request){
       $user= Auth::guard('delivery_boy')->user();

        return response()->json([
                'code' => '1',
                'status' => 'success',
                'data'=>"$user",

            ], 200);

    }


    public function delivery_boy_pick_up(Request $request)
    {
        //$user = Auth::guard('delivery_boy')->user();
        $user = delivery_boy::find(8);

        if (isset($user)) {


            $user_id = $user;
          //  $pick_up = order::all()->where('delivery_boy_id', $user_id);

            $pick_up = $user_id->order;
            foreach ($pick_up as $row){

                $vehicle = $row->vehicle;
                $client = $row->client;
                $city = $client->city;
                $country = $client->country;
                $district = $client->district;
                $status = $client->status;

            }

            if (count($pick_up) == 0) {
                return response()->json([
                    'code' => '0',
                    'status' => 'error',
                    'error_message' => "لم يتم استلام اى طلبات جديده"
                ], 200);
            } else {
                return response()->json([
                    'code' => '1',
                    'status' => 'success',
                    'data' => $pick_up,

                ], 200);

            }
        }else{
            return response()->json([
                'code' => '0',
                'status' => 'error',
                'error_message' => "لم يتم تسجيل الدخول "
            ], 200);
        }
    }

    public function delivery_boy_pick_up_singl(Request $request )
    {

//        $validation= $this->validate($request,
//            [
//                'delivery_boy_id'=>'required',
//                'Api_token'=>'required',
//                'pick_up_id'=>'required',
//            ]);
//

        $validation = Validator::make($request->all(), [
            'delivery_boy_id'=>'required',
                'Api_token'=>'required',
                'pick_up_id'=>'required',
        ]);
        if($validation->fails()) {
            $errors = $validation->errors();
            return response()->json([
                'code' => '0',
                'status' => 'error',
                'error_message' => $errors
            ], 200);
        }else{
           $delvery_boy=delivery_boy::find($request->delivery_boy_id);
           if(count($delvery_boy)==0){
               return response()->json([
                   'code' => '0',
                   'status' => 'error',
                   'error_message' => "هذا المستخدم غير موجود"
               ], 200);
           }else{
               $api_token=delivery_boy::find($request->delivery_boy_id)->api_token;
               if($api_token==$request->Api_token) {

                   $pick_up = order::all()->where('delivery_boy_id', $request->delivery_boy_id)->where('id', $request->pick_up_id);


                   if (count($pick_up) == 0) {
                       return response()->json([
                           'code' => '0',
                           'status' => 'error',
                           'error_message' => "هذا الطلب غير متاح الان"
                       ], 200);
                   } else {
                       return response()->json([
                           'code' => '1',
                           'status' => 'success',
                           'data' => $pick_up,

                       ], 200);
//
                   }
               }else{
                   return response()->json([
                       'code' => '0',
                       'status' => 'error',
                       'error_message' => "لم يتم تسجيل الدخول "
                   ], 200);
               }

           }
        }
//        $user = Auth::guard('delivery_boy')->user();
//               // $user = delivery_boy::find(8);
//        if (isset($user)) {
//            $user_id = $user->id;
//            $pick_up = order::all()->where('delivery_boy_id', $user_id)->where('id',$id);
//
//
//            if (count($pick_up) == 0) {
//                return response()->json([
//                    'code' => '0',
//                    'status' => 'error',
//                    'error_message' => "هذا الطلب غير متاح الان"
//                ], 200);
//            } else {
//                return response()->json([
//                    'code' => '1',
//                    'status' => 'success',
//                    'data' => $pick_up,
//
//                ], 200);
//
//            }
//        }else{
//            return response()->json([
//                'code' => '0',
//                'status' => 'error',
//                'error_message' => "لم يتم تسجيل الدخول "
//            ], 200);
//        }
    }

    public function delivery_boy_order()
    {
        //$user = Auth::guard('delivery_boy')->user();
       $user = delivery_boy::find(8);

        if (isset($user)) {
            $user_id = $user;
            $pick_up = $user_id->sub_order;
            foreach ($pick_up as $row){
                $city = $row->city;
                $country = $row->country;
                $district = $row->district;
                $status = $row->status;
                $order = $row->order;
                $service = $row->service;
            }



         //   $pick_up = sub_order::all()->where('delivery_boy_id', $user_id);

            if (count($pick_up) == 0) {
                return response()->json([
                    'code' => '0',
                    'status' => 'error',
                    'error_message' => "لم يتم استلام اى شحنات جديده"
                ], 200);
            } else {
                return response()->json([
                    'code' => '1',
                    'status' => 'success',
                    'data' => $pick_up,

                ], 200);

            }
        }else{
            return response()->json([
                'code' => '0',
                'status' => 'error',
                'error_message' => "لم يتم تسجيل الدخول "
            ], 200);
        }
    }


    public function delivery_boy_order_singl( $id)
    {
        $user = Auth::guard('delivery_boy')->user();
       // $user = delivery_boy::find(8);

        if (isset($user)) {
            $user_id = 8;
            $pick_up = sub_order::all()->where('delivery_boy_id', $user_id)->where('id',$id);

            if (count($pick_up) == 0) {
                return response()->json([
                    'code' => '0',
                    'status' => 'error',
                    'error_message' => "هذه الشحنه غير متاحه الان"
                ], 200);
            } else {
                return response()->json([
                    'code' => '1',
                    'status' => 'success',
                    'data' => $pick_up,

                ], 200);

            }
        }else{
            return response()->json([
                'code' => '0',
                'status' => 'error',
                'error_message' => "لم يتم تسجيل الدخول "
            ], 200);
        }
    }
}
