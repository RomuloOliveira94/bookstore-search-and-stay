<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Store;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(5)->create();
        Book::factory(15)->create();
        Store::factory(10)->create();

        $books = Book::all();
        
        Store::all()->each(function ($store) use ($books) {
            $store->books()->attach(
                $books->random(rand(1, 5))->pluck('id')->toArray(),
                ['quantity' => rand(1, 10)]
            );
        });
    }
}
