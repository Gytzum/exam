<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authors</title>
    <style>
        #author {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #author td,
        #author th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #author tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #author tr:hover {
            background-color: #ddd;
        }

        #author th {
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
        <h1>Authors list :</h1>
        <table id="author">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Books</th>
            </tr>
            @foreach ($authors as $author)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $author->name }}</td>
                    <td>{{ $author->surname }}</td>
                    <td>
                        @foreach ($author->books as $book)
                            <b>{{ $book->title }}@if (!$loop->last),@endif</b>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>

</html>
