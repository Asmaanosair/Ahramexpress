<?php

namespace App\Http\Controllers;
use App\order;
use App\vehicle;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\account;
use App\bank;
use App\client;
use App\status;


use Illuminate\Http\Request;

class clientcontroller extends Controller
{
    function index(){
        $client=client::paginate(20);
        $vehicl=vehicle::all();
        $status=status::all();
        return view('admin.client.clients',['client'=>$client,'vehicl'=>$vehicl,'status'=>$status]);
    }

    function create(){

        return view('admin.client.c_client');
    }


    function edit($id){
        $client=client::find($id);
        $account=account::where('client_id',$id)->First();
        $bank=bank::where('client_id',$id)->First();
        return view('admin.client.e_client',['client'=>$client,'account'=>$account,'bank'=>$bank]);
    }


    function add(Request $request){

        $this->validate($request,
            [
                'name' => 'required',
                'email' => 'required|unique:clients',
                'password' => 'required',

            ]);
        $test=new client();
        $test->name=$request->name;
        $test->phone=$request->ph;
        $test->address=$request->address;
        $test->password=Hash::make($request['password']);
        $test->email=$request->email;
        $test->company=$request->company;
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
            $test->attach=implode(',',$files2);
        }


        if (!empty($request->file('image2'))) {
            $files3 = [];
            foreach ($request->file('image2') as $media) {
                if (!empty($media)) {
                    $destinationPath = 'img';
                    $filename2 = $media->getClientOriginalName();
                    $media->move($destinationPath, $filename2);
                    $files3[] = $filename2;
                }
            }
            $test->other=implode(',',$files3);

        }



        if($test->save()){
            $client_id=$test->id;
            $test2=new bank();
            $test2->bank=$request->bank;
            $test2->username=$request->name2;
            $test2->address=$request->address2;
            $test2->account=$request->account;
            $test2->client_id=$client_id;
            if($test2->save()){
                $client_id=$test->id;
                $test3=new account();
                $test3->name=$request->name3;
                $test3->number=$request->number;
                $test3->vf=$request->vf;
                $test3->et=$request->et;
                $test3->orang=$request->orang;
                $test3->client_id=$client_id;
                if($test3->save()){
                    session()->flash("success","تمت الاضافه بنجاح  ");

        return back();
                }
            }


        }

    }





    function update(Request $request,$id){


        $test=client::find($id);
        $test->name=$request->name;
        $test->phone=$request->ph;
        $test->address=$request->address;
        $test->password=Hash::make($request['password']);
        $test->email=$request->email;
        $test->company=$request->company;
        if($test->save()){
            $bank=bank::where('client_id',$id)->First();
           if(count($bank)==0){
               $test2=new bank();
               $test2->bank=$request->bank;
               $test2->username=$request->name2;
               $test2->address=$request->address2;
               $test2->account=$request->account;
               $test2->client_id=$id;
               $test2->save();

           }else{
               $test2=bank::where('client_id',$id)->First();
               $test2->bank=$request->bank;
               $test2->username=$request->name2;
               $test2->address=$request->address2;
               $test2->account=$request->account;
               $test2->client_id=$id;
               $test2->save();
           }

            if($test2->save()){
                $account=account::where('client_id',$id)->First();
                if(count($account)==0){
                    $test3=new account();
                    $test3->name=$request->name3;
                    $test3->number=$request->number;
                    $test3->vf=$request->vf;
                    $test3->et=$request->et;
                    $test3->orang=$request->orang;
                    $test3->client_id=$id;
                    $test3->save();
                }else{
                    $test3=account::where('client_id',$id)->First();
                    $test3->name=$request->name3;
                    $test3->number=$request->number;
                    $test3->vf=$request->vf;
                    $test3->et=$request->et;
                    $test3->orang=$request->orang;
                    $test3->client_id=$id;
                    $test3->save();

                }


                if($test3->save()){
                    session()->flash("success","تمت الاضافه بنجاح  ");

                    return back();
                }
            }


        }

    }
    function singl_client($id){
        $client=client::find($id);
        $status=status::all();
        $account=account::where('client_id',$id)->First();
        $bank=bank::where('client_id',$id)->First();
        return view('admin.client.singl_client',['client'=>$client,'account'=>$account,'bank'=>$bank,'status'=>$status]);
    }

    function del_attach($id,$img){
        $img2=client::find($id)->attach;
        $images=  explode(",", $img2);
        $key= array_search($img,$images);

        unset($images[$key]);

        $images2=implode(",", $images);
        $img3=client::find($id);
        $img3->attach= $images2;
        $img3->save();
        return back();
    }

    function del_other($id,$img){
        $img2=client::find($id)->other;
        $images=  explode(",", $img2);
        $key= array_search($img,$images);

        unset($images[$key]);

        $images2=implode(",", $images);
        $img3=client::find($id);
        $img3->other= $images2;
        $img3->save();
        return back();
    }


    function add_account(Request $request,$id){
            $client_id=$id;
                $test3=new account();
                $test3->name=$request->name3;
                $test3->number=$request->number;
                $test3->vf=$request->vf;
                $test3->et=$request->et;
                $test3->orang=$request->orang;
                $test3->client_id=$client_id;
                if($test3->save()){
                    session()->flash("success","تمت الاضافه بنجاح  ");

                    return back();
                }
            }

    function add_bank(Request $request,$id){
        $client_id=$id;
        $test2=new bank();
        $test2->bank=$request->bank;
        $test2->username=$request->name2;
        $test2->address=$request->address2;
        $test2->account=$request->account;
        $test2->client_id=$client_id;
        if($test2->save()){
            session()->flash("success","تمت الاضافه بنجاح  ");

            return back();
        }
    }


    function add_attach(Request $request,$id){

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


    function add_other(Request $request,$id){

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

    function orders_show($id){
        $order=order::where('client_id',$id)->get();
        $client=client::find($id);
        return view('admin.client.order',['order'=>$order,'client'=>$client]);
    }




    
}
