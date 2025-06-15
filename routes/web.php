<?php

use App\Http\Controllers\TestController;
use App\Models\Book;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/books', function () {

    $books = Book::with(['author', 'tags'])->paginate(3);

    return view('books',  [
        'books' => $books
    ]);
});

Route::get('/books/{id}', function ($id) {

    $book = Book::find($id);

    $author = $book->author;
    dd($author->first_name);

    return view('book',  ['book' => $book]);;
});



Route::get('/test', [TestController::class, 'index']);
