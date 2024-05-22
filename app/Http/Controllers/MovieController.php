<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::all();
        return view('pages.homepage', ['movies' => $movies]);
    }

    public function indexToprated()
    {
        $top_rated_movies = Movie::all();
        return view('pages.homepage', ['topRatedMovies' => $topRatedMovies]);
    }

    public function indexUpcoming()
    {
        $upcoming_movies = Movie::all();
        return view('pages.homepage', ['upcomingMovies' => $upcomingMovies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $movie = Movie::findOrFail($id);

        return view('pages.moviedetail', ['movie' => $movie]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $query)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        //
    }

    public function search($query)
    {
        $movie = Movie::where('title', 'LIKE', "%$query%")->get();
        return response()->json($movie);
    }
}
