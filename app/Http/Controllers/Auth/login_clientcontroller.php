<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\client;

class login_clientcontroller extends Controller
{


   // protected $redirectTo = '/';
    protected $redirectTo = '/login_client';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        // $this->middleware('guest:delivery_boy')->except('logout');
    }
    public function showclientLoginForm()
    {
        return view('auth.login_client');
    }


    public function client_login( Request $request)
    {
        $this->validate($request, [

//            'phone' => 'required|numeric|min:15',
          //  'password'=>'required|string|min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'
            'password'=>'required|string|min:4'

        ]);

        if(Auth::guard('client')->attempt(['phone'=>$request->phone,'password'=>$request->password])){
             return redirect('/client_account');
           // return "oooooooooooooooooook";

        }else {
              session()->flash("success","  برجاء التاكد من رقم الموبايل او الباسورد  ");
            return back();
        }
    }
    
     public function showclientregisterForm()
    {
        return view('auth.register_client');
    }


    protected function client_register( Request $request)
    {
         
  
   
        $this->validate($request,
            [
                'phone' => 'required|unique:clients',
                'password' => 'required|min:8|required_with:password_confirmation|string|confirmed',

            ]);
        $test = new client();
      
        $test->phone = $request->phone;
        $test->password =  Hash::make($request['password']);
      if(  $test->save()){
        
        return redirect('/client_login');
}
return back();
    
    
    }
}
