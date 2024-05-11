<?php

namespace App\Http\Controllers\Api\V1\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\Store\StoreStoreRequest;
use App\Http\Requests\Store\UpdateStoreRequest;
use App\Models\Store;

class StoreController extends Controller
{
    public function index()
    {
        return Store::with('books')->get();
    }

    public function show(Store $store)
    {
        return $store->load('books');
    }

    public function store(StoreStoreRequest $request)
    {
        return Store::create($request->validated());
    }

    public function update(UpdateStoreRequest  $request, Store $store)
    {
        return $store->update($request->validated());
    }

    public function destroy(Store $store)
    {
        $store->delete();
        return response()->noContent();
    }
}
