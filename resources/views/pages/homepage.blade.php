@extends('welcome')
@section('content')
    <home-page :movies="{{ $movies }}" :artists="{{ $artists }}" ></home-page>
@endsection
