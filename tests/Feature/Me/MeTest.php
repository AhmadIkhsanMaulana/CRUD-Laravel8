<?php

namespace Tests\Feature\Me;

use App\Http\Resources\User as ResourcesUser;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class MeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testMe()
    {
        $user = User::factory()->make();

        $response = $this->actingAs($user)->get('/api/me');
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJsonStructure();
    }
}
