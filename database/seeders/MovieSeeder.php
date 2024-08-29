<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\MovieTheatreRelation;
use App\Models\Theatre;
use App\Models\Ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Movie::factory(30)->create();

        $movie = Movie::all();
        foreach($movie as $m){
            $t = Theatre::inRandomOrder()->first()->theatre_id;
            $data = [
                'theatre_id' => $t,
                'movie_id' => $m->movie_id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ];
            DB::table('movie_theatre_relations')->insert($data);
        }

        $theatre = Theatre::all();
        $relation = MovieTheatreRelation::all();
        $found = 0;
        foreach($theatre as $t){
            $theatre_id = $t->theatre_id;
            do{
                $found=0;
                $movie_id = Movie::inRandomOrder()->first()->movie_id;
                foreach($relation as $r){
                    if($movie_id == $r->movie_id && $theatre_id == $r->theatre_id){
                        $found = 1;
                        break;
                    }
                }
                if($found==0){
                    $data = [
                        'theatre_id' => $theatre_id,
                        'movie_id' => $movie_id,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ];
                    DB::table('movie_theatre_relations')->insert($data);
                }
            }while($found==1);

        }
    }
}
