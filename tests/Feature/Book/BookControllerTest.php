<?php

use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index()
    {
        $user = User::factory()->create();

        Book::factory(5)->create();

        $response = $this->actingAs($user)->get('/api/v1/books');;
        $response->assertStatus(200);
        $response->assertJsonCount(5);
    }

    public function test_store()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/api/v1/books', [
            'title' => 'The Great Gatsby',
            'ISBN' => 1231311,
            'value' => 9.99,
        ]);

        $response->assertStatus(201);
        $response->assertJson([
            'title' => 'The Great Gatsby',
            'ISBN' => 1231311,
            'value' => 9.99,
        ]);
    }



}

