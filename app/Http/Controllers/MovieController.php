<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    public function edit_movie_info_page($movie_id){
        $movie = Movie::find($movie_id);
        return view('edit_movie_info', compact('movie'));
    }

    public function edit_movie_info(Request $request){

        $rules = [
            'movie_name' => 'required|min:5',
            'duration' => 'required|integer|between:80,180',
            'dimension' => 'required|in:2D,3D',
            'age' => 'required|in:SU,R13+,D17+',
            'synopsis' => 'required|min:20',
            'producer' => 'required|min:5',
            'director' => 'required|min:5',
            'writer' => 'required|min:5',
            'casts' => 'required|min:5'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){

            return back()->withErrors($validator);
        }

        $movie = Movie::find($request->movie_id);
        $movie->movie_name = $request->movie_name;
        $movie->duration = $request->duration;
        $movie->dimension = $request->dimension;
        $movie->age = $request->age;
        $movie->synopsis = $request->synopsis;
        $movie->producer = $request->producer;
        $movie->director = $request->director;
        $movie->writer = $request->writer;
        $movie->casts = $request->casts;
        $movie->save();

        return redirect()->route('movie_detail',['movie_id'=>$request->movie_id]);
    }

    public function add_new_movie_page(){
        return view('add_movie_info');
    }

    public function add_new_movie(Request $request){
            $rules = [
                'image' => 'required|mimes:jpg,png,jpeg',
                'movie_name' => 'required|min:5',
                'duration' => 'required|integer|between:80,180',
                'dimension' => 'required|in:2D,3D',
                'age' => 'required|in:SU,R13+,D17+',
                'synopsis' => 'required|min:20',
                'producer' => 'required|min:5',
                'director' => 'required|min:5',
                'writer' => 'required|min:5',
                'casts' => 'required|min:5'
            ];

            $validator = Validator::make($request->all(), $rules);

            if($validator->fails()){

                return back()->withErrors($validator);
            }

            $file = $request->file('image');
            $image_name = time().'.'.$file->getClientOriginalExtension();
            Storage::putFileAs("public/images",$file,$image_name);
            $image_url = 'images/'.$image_name;

            $data = [
                'movie_url' => $image_url,
                'movie_name' => $request->movie_name,
                'duration' => $request->duration,
                'dimension' => $request->dimension,
                'age' => $request->age,
                'synopsis' => $request->synopsis,
                'producer' => $request->producer,
                'director' => $request->director,
                'writer' => $request->writer,
                'casts' => $request->casts,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ];
            DB::table('movies')->insert($data);
            $mtr = new MovieTheatreRelationController;
            return $mtr->add_relationship_by_movie(DB::table('movies')->latest('created_at')->first()->movie_id);

    }

    public function delete_movie($movie_id){
        Movie::destroy($movie_id);
        return redirect()->route('home');
    }

    public function movie_detail($movie_id){
        $movie = Movie::find($movie_id);
        return view('movie_info', compact('movie'));
    }

}
