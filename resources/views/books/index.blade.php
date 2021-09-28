@extends('layouts.app')
@section('content')
    <div class="card-body container">
        @if (session('status_success'))
            <p style="color: green"><b>{{ session('status_success') }}</b></p>
        @else
            <p style="color: red"><b>{{ session('status_error') }}</b></p>
        @endif
        <h1>Books</h1>

        <div class="card-body row ">
            <form action="{{ route('books.index') }}" method="GET">
                <select name="author_id" class=" custom-select-lg">
                    <option selected disabled>Filter by Author :</option>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}" @if ($author->id == app('request')->input('author_id')) selected="selected" @endif>
                            {{ $author->name . ' ' . $author->surname }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary btn-lg">Filter</button>
                <a class="btn btn-success btn-lg" href={{ route('books.index') }}>Show All</a>
            </form>
        </div>

        <table class="table table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Pages</th>
                    <th scope="col">ISBN</th>
                    <th scope="col">Description</th>
                    <th scope="col" style="width:20%">Actions</th>
                </tr>
            </thead>
            @foreach ($books as $book)
                <tr scope="row">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->pages }}</td>
                    <td>{{ $book->isbn }}</td>
                    <td>{!! $book->short_description !!}</td>
                    <td>
                        <form action={{ route('books.destroy', $book->id) }} method="POST">
                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-secondary">Show</a>
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-success">Edit</a>
                            @csrf @method('delete')
                            <input type="submit" class="btn btn-danger" value="Delete" />
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
            <a class="btn btn-success btn-lg mb-3 px-5" href="{{ route('books.create') }}">Create</a>
            <a href="{{ route('books.download') }}" class="btn btn-info btn-lg mb-3 px-5" target="_blank">Download</a>
        </div>
    </div>
@endsection
