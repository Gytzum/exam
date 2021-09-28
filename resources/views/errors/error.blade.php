@extends('layouts.app')
@section('content')
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">

    <div class="welcome">
        <h1>This supose to be funny error page</h1>
        <a class="btn btn-info" href="{{ route('welcome')}}">Back</a>
    </div>
@endsection
