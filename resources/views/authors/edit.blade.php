@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-light bg-dark">Add Author:</div>
                    <div class="card-body">
                        <form action="{{ route('authors.update', $author->id) }}" method="POST">
                            @csrf @method('PUT')
                            <div class="form-group">
                                <label for="">Name: </label>
                                <input type="text" required name="name" class="form-control" value="{{ $author->name }}">
                                @error('name')
                                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Surname: </label>
                                <input type="text" required name="surname" class="form-control" value="{{ $author->surname }}">
                                @error('surname')
                                 <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-success">Submit</button>
                            <a class="btn btn-info" href="{{ route('authors.index') }}">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
