<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books</title>
    <style>
        #book {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #book td,
        #book th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #book tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #book tr:hover {
            background-color: #ddd;
        }

        #book th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }

    </style>
</head>

<body>
    <div class="container">
        <h1>Books list :</h1>
        <table id="book">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Pages</th>
                <th>ISBN</th>
                <th>Description</th>
                <th>Author</th>
            </tr>
            </thead>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->pages }}</td>
                    <td>{{ $book->isbn }}</td>
                    <td>{!! $book->short_description !!}</td>
                    @if ($book->author)
                        <td>{{ $book->author->name . ' ' . $book->author->surname }}</td>
                    @endif
                </tr>
            @endforeach
        </table>
    </div>
</body>

</html>
