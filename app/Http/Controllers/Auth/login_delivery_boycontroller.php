<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use Auth;




class login_delivery_boycontroller extends Controller
{

    protected $redirectTo = '/test';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

       // $this->middleware('guest:delivery_boy')->except('logout');
    }
    public function showWriterLoginForm()
    {
        return view('auth.delivery_boy_login');
    }


    public function delivery_boy_login( Request $request)
    {
        $this->validate($request, [

            'phone' => 'required',
            'password'=>'required'

        ]);

        if(Auth::guard('delivery_boy')->attempt(['phone'=>$request->phone,'password'=>$request->password])){
            // return redirect('/delivery_boy');
            return "oooooooooooooooooook";

        }else {
            return back();
        }
    }
}
