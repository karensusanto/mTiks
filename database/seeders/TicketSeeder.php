<?php

namespace Database\Seeders;

use App\Models\MovieTheatreRelation as MovieTheatreRelation;
use App\Models\Ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ticket::factory(40)->create();

        $tickets = Ticket::all();
        $relation = MovieTheatreRelation::all();
        $found = 0;
        foreach($tickets as $ticket){
            $found=0;
            $movie_id = $ticket->movie_id;
            $theatre_id = $ticket->theatre_id;

            foreach($relation as $r){
                if($movie_id == $r->movie_id && $theatre_id == $r->theatre_id){
                    $found = 1;
                    break;
                }
            }
            if($found==0){//drop row
                Ticket::destroy($ticket->ticket_id);
            }
        }
    }
}
