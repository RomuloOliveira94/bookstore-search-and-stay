<?php

namespace App\Http\Controllers\Api\V1\Book;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\StoreBookRequest;
use App\Http\Requests\Book\UpdateBookRequest;
use App\Models\Book;

class BookController extends Controller
{

    public function index()
    {
        return Book::with('stores')->get();
    }

    public function store(StoreBookRequest $request)
    {
        return Book::create($request->validated());
    }

    public function show(Book $book)
    {
        return $book->load('stores');
    }

    public function update(UpdateBookRequest $request, Book $book)
    {
        return $book->update($request->validated());
    }

    public function destroy(Book $book)
    {
        if ($book->stores()->exists()) {
            $book->stores()->detach();
            $book->delete();
        }

        $book->delete();
        return response()->noContent();
    }
}
