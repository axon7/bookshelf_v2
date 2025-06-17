<?php

use App\Models\Book;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/books', function () {
    $books = Book::with(['author', 'tags'])->latest()->cursorPaginate(3);
    return view('books.index',  [
        'books' => $books
    ]);
});

Route::post('/books', function () {

    request()->validate([
        'title' => 'required|min:3|max:255',
        'author_id' => 'required|exists:authors,id',
        'description' => 'nullable|string|max:1000',
    ]);

    Book::create([
        'title' => request('title'),
        'author_id' => request('author_id'),
        'description' => request('description'),
        'date_of_publication' => now(),
    ]);

    return redirect('/books');
});

Route::get('/books/create', function () {
    return view('books.create',  ['book' => 'test']);;
});

Route::get('/books/{id}', function ($id) {
    $book = Book::find($id);
    // $author = $book->author;
    // dd($author->first_name);

    return view('books.show',  ['book' => $book]);;
});


//Edit a book (view)
Route::get('/books/{id}/edit', function ($id) {
    $book = Book::find($id);
    return view('books.edit',  ['book' => $book]);;
});

// Update a book
Route::patch('/books/{id}', function ($id) {
    $book = Book::find($id);

    request()->validate([
        'title' => 'required|min:3|max:255',
        // 'author_id' => 'required|exists:authors,id',
        'description' => 'nullable|string|max:1000',
    ]);

    $book->update([
        'title' => request('title'),
        'author_id' => 1,
        'description' => request('description'),
    ]);

    return redirect('/books/' . $book->id);
});

//Delete a book
Route::delete('/books/{id}', function ($id) {
    $book = Book::findOrFail($id);
    $book->delete();
    return redirect('/books');
});




Route::get('/test', function () {
    return Json::encode([
        'name' => 'John Doe',
        'age' => 30,
        'skills' => ['PHP', 'Laravel', 'JavaScript'],
        'address' => [
            'street' => '123 Main St',
            'city' => 'Anytown',
            'country' => 'USA'
        ]
    ]);
});
