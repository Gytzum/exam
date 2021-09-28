<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\{
    AuthorController,
    BookController
};
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware(['auth'])->group(function () {
    Route::get('home', [AuthorController::class, 'index']);
    Route::get('books/download', [BookController::class, 'generatePdf'])->name('books.download');
    Route::get('authors/download', [AuthorController::class, 'generatePdf'])->name('authors.download');

    Route::resource('authors', AuthorController::class);
    Route::resource('books', BookController::class);
});

Route::any('/{any}', function () {
    return view('errors/error');
})->where('any', '.*');
