<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class AuthTest extends TestCase
{

    use RefreshDatabase;
    use WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLogin()
    {
        $user = User::factory()->create();

        $payload = [
            'email' => $user->email,
            'password' => 'test',
        ];

        $response = $this->post('/api/auth', $payload);
        $response->assertStatus(Response::HTTP_OK);
    }
}
