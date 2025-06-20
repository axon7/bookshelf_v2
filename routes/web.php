<?php

use App\Http\Controllers\BookController;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');

Route::get('/books', [BookController::class, 'index']);
Route::get('/books/create', [BookController::class, 'create']);
Route::get('/books/{id}', [BookController::class, 'show']);
Route::post('/books', [BookController::class, 'store']);
Route::get('/books/{id}/edit', [BookController::class, 'edit']);
Route::patch('/books/{book}', [BookController::class, 'update']);
Route::delete('/books/{id}', [BookController::class, 'destroy']);

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
