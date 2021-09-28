@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-light bg-dark">Add Book:</div>
                    <div class="card-body">
                        <form action="{{ route('books.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Title: </label>
                                <input type="text" required name="title" class="form-control">
                                @error('title')
                                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Pages: </label>
                                <input type="number" required name="pages" class="form-control">
                                @error('pages')
                                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">ISBN: </label>
                                <input type="text" required name="isbn" class="form-control">
                                @error('isbn')
                                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Description: </label>
                                <textarea id="mce" style="height: 300px" type="text" name="short_description"
                                    class="form-control"> </textarea>
                                @error('short_description')
                                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Assign Author: </label>
                                <select name="author_id" class="form-control">
                                    <option value="0" selected disabled>Choose Author</option>
                                    @foreach ($authors as $author)
                                        <option value="{{ $author->id }}">{{ $author->name .' '. $author->surname}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <button type="submit" class="btn btn-success">Submit</button>
                            <a class="btn btn-info" href="{{ route('books.index') }}">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
