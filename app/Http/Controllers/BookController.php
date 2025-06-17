<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index()
    {
        $books = Book::with(['author', 'tags'])->latest()->cursorPaginate(3);

        return view('books.index',  [
            'books' => $books
        ]);
    }

    public function create()
    {
        return view('books.create',  ['book' => 'test']);
    }

    public function show($id)
    {
        $book = Book::find($id);
        return view('books.show',  ['book' => $book]);;
    }

    public function store()
    {
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
    }

    public function edit($id)
    {
        $book = Book::find($id);
        return view('books.edit',  ['book' => $book]);
    }

    public function update($id)
    {
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
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect('/books');
    }
}
