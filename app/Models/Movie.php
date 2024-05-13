<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
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
        'award'
    ];

    public function favorites()
    {
        return $this->belongsToMany(Favorite::class);
    }
}
