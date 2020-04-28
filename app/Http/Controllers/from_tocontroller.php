<?php

namespace App\Http\Controllers;

use App\city;
use App\distance;
use App\from_to_distance;
use Illuminate\Http\Request;

class from_tocontroller extends Controller
{

    public function show($id){
        $city=from_to_distance::where('distance_id',$id)->paginate(10);
        $city1 =city::all();
        $name =distance::find($id);
        return view('admin.from_to_distance.show_all',['city'=>$city,'city1'=>$city1,'name'=>$name]);
    }


    function add(Request $request,$id){

        $this->validate($request,
            [
                'from'=>'required',
                'to'=>'required',
            ]);
        $city=explode(',',$request->to);
        foreach ($city as $row) {
            $city1=from_to_distance::where('from_city_id',$row)->where('to_city_id',$request->from)->first();
            $city2=from_to_distance::where('from_city_id',$request->from)->where('to_city_id',$row)->first();
            if(count($city1)==1||count($city2)==1) {
                $test = from_to_distance::find($city1->id);
                $test->to_city_id = $row;
                $test->from_city_id = $request->from;
                $test->distance_id = $id;
                $test->save();

            }
            else{
                $test = new from_to_distance();
                $test->to_city_id = $row;
                $test->from_city_id = $request->from;
                $test->distance_id = $id;
                $test->save();
            }
        }
        if($test->save()){
            session()->flash("success","تمت الاضافه بنجاح  ");
            return back();
        }
    }
    function update(Request $request,$id){

        $this->validate($request,
            [
                'from'=>'required',
                'to'=>'required',

            ]);
        $test=from_to_distance::find($id);
        $test->to_city_id = $request->to;
        $test->from_city_id = $request->from;
        $test->distance_id = $id;
        $test->save();

        if($test->save()){
            session()->flash("success","تم التعديل بنجاح  ");
            return back();
        }


    }
    function delete($id){
        $test=from_to_distance::find($id);
        $test->delete();
        return back();

    }
}
