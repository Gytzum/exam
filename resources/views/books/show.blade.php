@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-light bg-dark">Book Info:</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Title: </label>
                            <input type="text" disabled class="form-control" placeholder="{{ $book->title }}">
                        </div>

                        <div class="form-group">
                            <label for="">Pages: </label>
                            <input type="number" disabled class="form-control" placeholder="{{ $book->pages }}">
                        </div>

                        <div class="form-group">
                            <label for="">ISBN: </label>
                            <input type="text" disabled class="form-control" placeholder="{{ $book->isbn }}">
                        </div>

                        <div class="form-group">
                            <label for="">Author: </label>
                            <input type="text" disabled class="form-control" @if ($book->author)
                            placeholder="{{ $book->author->name . ' ' . $book->author->surname }}"
                            @endif>
                        </div>

                        <div class="form-group">
                            <label for="">Description: </label>
                            <textarea disabled style="height: 300px" type="text"
                                class="form-control"> {!! strip_tags($book->short_description) !!} </textarea>
                        </div>

                        <a class="btn btn-info" href="{{ route('books.index') }}">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
