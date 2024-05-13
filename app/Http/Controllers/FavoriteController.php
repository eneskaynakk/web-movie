<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function addFavoriteCourse(Course $course)
    {
        if (auth()->check()) {

				//This condition does not apply
            if (in_array(auth()->user()->favorites ,$course->favorites)) {
                auth()->user()->favorites()->create([
                    'course_id' => $course->id
                ]);
                toast('The course was successfully added to your list of favorite courses', 'success');
                return back();
            } else {
                toast('There are already courses in your favorites', 'error');
            }
        }
        toast('To add to your favorites list, you must first login', 'error');
        return back();
    }
}
