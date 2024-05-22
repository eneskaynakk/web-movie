<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toprated extends Model
{
    use HasFactory;

    protected $fillable = [
        'imdbID',
        'title',
        'year',
        'rated',
        'runtime',
        'rating',
        'poster',
        'genre',
        'plot',
        'director',
        'writer',
        'actor',
        'type',
        'country',
        'award',
        'imdbVote'
    ];


}
