<?php

namespace Database\Factories;

use App\Models\User as User;
use App\Models\Movie as Movie;
use App\Models\MovieTheatreRelation;
use App\Models\Theatre;
use Database\Seeders\MovieTheatreRelationSeeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'users_id' =>  User::inRandomOrder()->first()->users_id ,
            'movie_id' => Movie::inRandomOrder()->first()->movie_id,
            'theatre_id' => Theatre::inRandomOrder()->first()->theatre_id,
            'movie_time' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ];

    }
}
