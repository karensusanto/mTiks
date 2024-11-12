<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function buy_ticket($movie_id, $user_id){
        $theatre = DB::table('movie_theatre_relations')
        ->select('theatre_id')
        ->where('movie_id','=',$movie_id)
        ->inRandomOrder()->first();

        $data = [
            'users_id' =>  $user_id ,
            'movie_id' => $movie_id,
            'theatre_id' => $theatre->theatre_id,
            'movie_time' => Carbon::now()->format('Y-m-d H:i:s'),
        ];
        DB::table('tickets')->insert($data);
        return redirect()->route('tickets',['member_id'=>$user_id]);
    }
}
