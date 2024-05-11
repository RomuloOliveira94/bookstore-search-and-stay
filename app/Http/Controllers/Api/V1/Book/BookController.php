<?php

namespace App\Http\Controllers\Api\V1\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index()
    {
        return Book::all();
    }

    public function store(Request $request)
    {
        return Book::create($request->validate());
    }

    public function show(Book $book)
    {
        return $book;
    }

    public function update(Request $request, Book $book)
    {
        return $book->update($request->validate());
    }

    public function destroy(Book $book)
    {
        return $book->delete();
    }
}
