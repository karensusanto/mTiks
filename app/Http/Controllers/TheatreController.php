<?php

namespace App\Http\Controllers;

use App\Models\MovieTheatreRelation;
use App\Models\Theatre;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator as Validator;

class TheatreController extends Controller
{
    public function edit_theatre_info_page($theatre_id){
        $theatre = Theatre::find($theatre_id);
        return view('edit_theatre', compact('theatre'));
    }

    public function edit_theatre_info(Request $request){
        $rule = [
            'theatre_name'=>'required|min:5|ends_with:XXI'
        ];

        $validator = Validator::make($request->all(), $rule);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $theatre = Theatre::find($request->theatre_id);
        $theatre->theatre_name = $request->theatre_name;
        $theatre->save();
        return redirect()->route('theatres');
    }

    public function add_theatre(Request $request){
        $rule = [
            'theatre_name'=>'required|min:5|ends_with:XXI,xxi'
        ];

        $validator = Validator::make($request->all(), $rule);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $data = [
            'theatre_name' => $request->theatre_name,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ];
        DB::table('theatres')->insert($data);
        $mvr = new MovieTheatreRelationController;
        return $mvr->add_relationship_by_theatre(DB::table('theatres')->latest('created_at')->first()->theatre_id);
    }

    public function add_theatre_page(){
        return view('add_theatre_info');
    }

    public function delete_theatre($theatre_id){
        Theatre::destroy($theatre_id);

        return redirect()->route('theatres');
    }
}
