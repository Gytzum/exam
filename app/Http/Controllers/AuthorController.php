<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('authors.index', ['authors' => Author::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuthorRequest $request)
    {
        $author = new Author();
        $author->fill($request->all());
        $author->save();

        return ($author->save() !== 1) ?
            redirect('/authors')->with('status_success', 'Author successfully created!') :
            redirect('/authors')->with('status_error', 'Author was not created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        $books = Book::where('author_id', $author->id)->get();
        return view('authors.show', ['author' => $author], ['books' => $books]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('authors.edit', ['author' => $author]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAuthorRequest $request, Author $author)
    {

        $author->fill($request->all());
        return ($author->save() !== 1) ?
            redirect('/authors')->with('status_success', 'Author successfully updated!') :
            redirect('/authors')->with('status_error', 'Author was not updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        return ($author->delete() !== 1) ?
            redirect('/authors')->with('status_success', 'Author successfully deleted!') :
            redirect('/authors')->with('status_error', 'Author was not deleted!');
    }

    public function generatePdf()
    {
        $authors = Author::orderBy('name')->get();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML(view('authors.generatePdf', ['authors' => $authors]));
        return $pdf->stream();
    }
}
