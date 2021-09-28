@extends('layouts.app')
@section('content')
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">

    <div class="welcome">
        <h1>This supose to be beautiful landing page</h1>
        <ul class="welcome-ul list-inline">
            @if (!Auth::check())
                @if (Route::has('login'))
                    <li class="welcome-li list-inline-item">
                        <a class="welcome-btn" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif
                @if (Route::has('register'))
                    <li class="welcome-li list-inline-item">
                        <a class="welcome-btn" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
        </ul>
                @endif
                @else
                <li class="welcome-li list-inline-item ">
                    <a class="welcome-btn" href="{{ route('authors.index') }}" class="nav-link">Authors</a>                
                </li>
                <li class="welcome-li list-inline-item">
                    <a class="welcome-btn" href="{{ route('books.index') }}" class="nav-link">Books</a>                
                </li>               
            @endif
    </div>
@endsection
