@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-light bg-dark">Author Info:</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Name: </label>
                            <input disabled type="text" class="form-control" value="{{ $author->name }}">
                        </div>

                        <div class="form-group">
                            <label for="">Surname: </label>
                            <input type="text" disabled class="form-control" value="{{ $author->surname }}">
                        </div>

                        <div class="form-group">
                            <label for="">Books: </label>
                            <input type="text" disabled class="form-control"  value="@foreach ($books as $book){{ $book->title}}@if ( !$loop->last),@endif @endforeach">
                        </div>
                        <a class="btn btn-info" href="{{ route('authors.index') }}">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
