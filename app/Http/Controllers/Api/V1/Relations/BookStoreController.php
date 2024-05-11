<?php

namespace App\Http\Controllers\Api\V1\Relations;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookStore\StoreBookStoreRequest;
use App\Models\Book;
use App\Models\Store;

class BookStoreController extends Controller
{

    public function index(Book $book)
    {
        return $book->stores;
    }

    public function show(Book $book, Store $store)
    {
        if (!$book->stores()->find($store->id)) {
            return response()->json(['error' => 'Store not found in this book'], 404);
        }

        return $store;
    }


    public function store(Book $book, Store $store, StoreBookStoreRequest $request)
    {

        $store = Store::find($store->id);

        if (!$store) {
            return response()->json(['error' => 'Store not found'], 404);
        }

        if ($book->stores()->find($store->id)) {
            return response()->json(['error' => 'Store already added to book'], 409);
        }

        $book->stores()->attach($store, $request->validated());

        return response()->json(['message' => 'Store added to book'], 200);
    }

    public function destroy(Book $book, Store $store)
    {
        if (!$book->stores()->find($store->id)) {
            return response()->json(['error' => 'Store not found in this book'], 404);
        }

        $book->stores()->detach($store);

        return response()->json(['message' => 'Store removed from book'], 200);
    }
}
