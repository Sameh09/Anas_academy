<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test successful login.
     *
     * @return void
     */
    public function test_successful_login()
    {
        // Arrange: create a user
        $user = User::factory()->create([
            'email' => 'sameh@mail.com',
            'password' => Hash::make('12345678'),
        ]);

        // Act: attempt to log in
        $response = $this->post('/api/login', [
            'email' => 'sameh@mail.com',
            'password' => '12345678',
        ]);

        // Assert: check for successful response and presence of token
        $response->assertStatus(200);
        $response->assertJsonStructure(['token']);
    }

    /**
     * Test unsuccessful login with invalid credentials.
     *
     * @return void
     */
    public function test_unsuccessful_login()
    {
        // Arrange: create a user with known credentials
        $user = User::factory()->create([
            'email' => 'sameh@mail.com',
            'password' => Hash::make('12345678'),
        ]);

        // Act: attempt to log in with invalid credentials
        $response = $this->post('/api/login', [
            'email' => 'sameh@mail.com',
            'password' => '12345678',
        ]);

        // Assert: check for 401 Unauthorized status and error message
        $response->assertStatus(401);
        $response->assertJson(['error' => 'Invalid credentials']);
    }
}
