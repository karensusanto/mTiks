<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */



class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'movie_url' => 'images/mov'.$this->faker->numberBetween(1,12).'.png',
            'movie_name'=> $this->faker->name(),
            'duration'=> $this->faker->numberBetween(80,180),
            'dimension'=>$this->faker->randomElement(['2D','3D']),
            'age'=>$this->faker->randomElement(['SU','R13+','D17+']),
            'synopsis'=> $this->faker->realText(),
            'producer'=> $this->faker->name(),
            'director'=> $this->faker->name(),
            'writer'=> $this->faker->name().', '.$this->faker->name(),
            'casts'=> $this->faker->name().', '.$this->faker->name().', '.$this->faker->name().', '.$this->faker->name(),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ];
    }
}
