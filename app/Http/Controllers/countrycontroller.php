<?php

namespace App\Http\Controllers;

use App\country;
use Illuminate\Http\Request;

class countrycontroller extends Controller
{
    public function index(){
        $country=country::paginate(10);
        return view('admin.country.show_all',['country'=>$country]);
    }


    function add(Request $request){

        $this->validate($request,
            [
                'name'=>'required|unique:countries',
            ]);
        $name=explode(',',$request->name);
        foreach ($name as $row) {
            $test = new country();
            $test->name =$row;
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
        $test=country::find($id);
        $test->name=$request->name;

        if($test->save()){
            session()->flash("success","تم التعديل بنجاح  ");
            return back();
        }

    }
    function delete($id){
        $test=country::find($id);
        $test->delete();
        return back();

    }

}
