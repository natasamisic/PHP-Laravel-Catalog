<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_submit_comment()
    {
        $response = $this->post('/submit-comment', [
            'name' => 'John',
            'email' => 'john@example.com',
            'text' => 'This is a comment for the product.',
        ]);

        $this->assertDatabaseHas('comments', [
            'name' => 'John',
            'email' => 'john@example.com',
            'text' => 'This is a comment for the product.',
        ]);
    }

}
