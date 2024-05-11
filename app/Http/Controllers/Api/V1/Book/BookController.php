<?php

namespace App\Http\Controllers\Api\V1\Book;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index()
    {
        return Book::all();
    }

    public function store(StoreBookRequest $request)
    {
        return Book::create($request->validated());
    }

    public function show(Book $book)
    {
        return $book;
    }

    public function update(UpdateBookRequest $request, Book $book)
    {
        return $book->update($request->validated());
    }

    public function destroy(Book $book)
    {
        return $book->delete();
    }
}