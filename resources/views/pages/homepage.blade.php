@extends('welcome')
@section('content')
    <home-page :movies="{{ $movies }}"></home-page>
@endsection
