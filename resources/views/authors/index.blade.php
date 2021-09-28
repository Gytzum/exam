@extends('layouts.app')
@section('content')
    <div class="card-body container">
        @if (session('status_success'))
            <p style="color: green"><b>{{ session('status_success') }}</b></p>
        @else
            <p style="color: red"><b>{{ session('status_error') }}</b></p>
        @endif
        <h1>Authors</h1>
        <table class="table table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Books</th>
                    <th  scope="col" style="width:20%">Actions</th>
                </tr>
            </thead>
            @foreach ($authors as $author)
                <tr scope="row">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $author->name }}</td>
                    <td>{{ $author->surname }}</td>
                    <td>
                        @foreach ($author->books as $book )
                            <b>{{ $book->title }}@if ( !$loop->last),@endif</b>
                        @endforeach
                    </td>
                    <td>
                        <form action={{ route('authors.destroy', $author->id) }} method="POST">
                            <a href="{{ route('authors.show', $author->id) }}" class="btn btn-secondary btn-md">Show</a>
                            <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-success btn-md">Edit</a>
                            @csrf @method('delete')
                            <input type="submit" class="btn btn-danger btn-md" value="Delete" />
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
            <a class="btn btn-success btn-lg mb-3 px-5"  href="{{ route('authors.create') }}">Create</a>
            <a href="{{ route('authors.download') }}" class="btn btn-info btn-lg mb-3 px-5" target="_blank">Download</a>
        </div>

    </div>

@endsection