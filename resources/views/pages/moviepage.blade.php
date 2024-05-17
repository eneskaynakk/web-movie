@extends('welcome')
@section('content')
    <movie-page :movie="{{ $movie }}"></movie-page>
@endsection
