<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Favorite::where('user_id', Auth::id())->with('movie')->get();
        return response()->json($favorites);
    }

    public function store(Request $request)
    {
        $request->validate([
            'movie_id' => 'required|exists:movies,id',
        ]);

        $favorite = Favorite::create([
            'user_id' => Auth::id(),
            'movie_id' => $request->movie_id,
        ]);

        return response()->json($favorite, 201);
    }

    public function destroy($id)
    {
        $favorite = Favorite::where('user_id', Auth::id())->where('movie_id', $id)->first();
        if ($favorite) {
            $favorite->delete();
            return response()->json(null, 204);
        }

        return response()->json(['message' => 'Not Found'], 404);
    }

}
