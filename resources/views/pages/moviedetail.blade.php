@extends('welcome')
@section('content')
    <movie-detail :movie="{{ $movie }}"></movie-detail>
@endsection
