<?php

namespace Tests\Feature;

use App\Models\Classes;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class ClassTest extends TestCase
{
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $user = User::factory()->make();
        Classes::factory()->count(5)->make();

        $response = $this->actingAs($user)->get('/api/classes');

        $response->assertStatus(Response::HTTP_OK);
    }

    public function testShow()
    {
        $user = User::factory()->make();
        $class = Classes::factory()->create();

        $response = $this->actingAs($user)->get("/api/classes/$class->id");

        $response->assertStatus(Response::HTTP_OK);
    }

    public function testCreate()
    {
        $user = User::factory()->make();

        $payload = [
            'name' => 'kelas test',
            'teacher_id' => $this->faker->uuid,
        ];

        $response = $this->actingAs($user)->post('/api/classes', $payload);

        $response->assertStatus(Response::HTTP_CREATED);
    }

    public function testUpdate()
    {
        $user = User::factory()->make();
        $class = Classes::factory()->create();

        $payload = [
            'name' => $this->faker->name,
            'teacher_id' => $this->faker->uuid,
        ];

        $response = $this->actingAs($user)->patch("/api/classes/$class->id", $payload);

        $response->assertStatus(Response::HTTP_OK);
        $this->assertEquals($payload['name'], $response['data']['name']);
    }

    public function testDelete()
    {
        $user = User::factory()->make();
        $class = Classes::factory()->create();

        $response = $this->actingAs($user)->delete("/api/classes/$class->id");

        $response->assertStatus(Response::HTTP_OK);
    }

}
