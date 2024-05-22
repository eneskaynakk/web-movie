@extends('welcome')
@section('content')
    <home-page :movies="{{ $movies }}" :artists="{{ $artists }}" :top_rated_movies="{{ $top_rated_movies }}" :upcoming_movies="{{ $upcoming_movies }}"></home-page>
@endsection
