<?php

namespace App\Http\Controllers\Api\V1\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\Store\StoreStoreRequest;
use App\Http\Requests\Store\UpdateStoreRequest;
use App\Models\Book;

class StoreController extends Controller
{
    public function index()
    {
        return Book::all();
    }

    public function show(Book $book)
    {
        return $book;
    }

    public function store(StoreStoreRequest $request)
    {
        return Book::create($request->validated());
    }

    public function update(UpdateStoreRequest  $request, Book $book)
    {
        return $book->update($request->validated());
    }

    public function destroy(Book $book)
    {
        return $book->delete();
    }
}
