<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieTheatreRelation extends Model
{
    use HasFactory;

    protected $primaryKey = ['movie_id','theatre_id'];
    public $incrementing = false;
}
