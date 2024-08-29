<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\MovieTheatreRelation as MovieTheatreRelation;
use App\Models\Theatre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class MovieTheatreRelationController extends Controller
{
    public function add_relationship_by_movie($movie_id){
        $theatre_id = Theatre::inRandomOrder()->first()->theatre_id;
        $data = [
            'theatre_id' => $theatre_id,
            'movie_id' => $movie_id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ];
        DB::table('movie_theatre_relations')->insert($data);
        return redirect()->route('home');
    }

    public function add_relationship_by_theatre($theatre_id){
        $movie_id = Movie::inRandomOrder()->first()->movie_id;
        $data = [
            'theatre_id' => $theatre_id,
            'movie_id' => $movie_id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ];
        DB::table('movie_theatre_relations')->insert($data);
        return redirect()->route('theatres');
    }

    public function delete_relationship_by_movie(Request $request){
        MovieTheatreRelation::where('movie_id', '=', $request->movie_id)->delete();
        $m = new MovieController;
        return $m->delete_movie($request->movie_id);
    }

    public function delete_relationship_by_theatre(Request $request){
        MovieTheatreRelation::where('theatre_id', '=', $request->theatre_id)->delete();
        $t = new TheatreController;
        return $t->delete_theatre($request->theatre_id);
    }
}
