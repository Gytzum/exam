<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (isset($request->author_id) && $request->author_id !== 0) {
            $books = Book::where('author_id', $request->author_id)
                ->orderBy('title')->get();
            if ($books->count() == 0) {
                $author = Author::where('id', $request->author_id)->first();
                return redirect()->route('books.index')
                    ->with('status_error', "$author->name $author->surname does not have any books !!");
            }
        } else {
            $books = Book::orderBy('title')->get();
        }
        return view('books.index', ['books' => $books, 'authors' => Author::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create', ['authors' => Author::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        $book = new Book();
        $book->fill($request->all());
        $book->save();

        return ($book->save() !== 1) ?
            redirect('/books')->with('status_success', 'Book successfully created!') :
            redirect('/books')->with('status_error', 'Book was not created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('books.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('books.edit', ['book' => $book], ['authors' => Author::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $book->fill($request->all());
        return ($book->save() !== 1) ?
            redirect('/books')->with('status_success', 'Book successfully updated!') :
            redirect('/books')->with('status_error', 'Book was not updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        return ($book->delete() !== 1) ?
            redirect('/books')->with('status_success', 'Book successfully deleted!') :
            redirect('/books')->with('status_error', 'Book was not deleted!');
    }

    public function generatePdf(){
        $books = Book::orderBy('title')->get();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML(view('books.generatePdf', ['books' => $books]));
        return $pdf->stream();
    }
}
