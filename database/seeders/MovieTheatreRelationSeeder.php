<?php

namespace Database\Seeders;

use App\Models\MovieTheatreRelation;
use Database\Factories\MovieTheatreRelationFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieTheatreRelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try{
            MovieTheatreRelation::factory(30)->create();
        }catch(\Exception $exception){

        }

    }
}
