<?php

namespace Tests\Feature;

use App\Models\Category;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryApiTest extends TestCase {

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_all_category()
    {
        $response = $this->getJson("/api/categories");
        $response->assertStatus(200)
                 ->assertJson($response->json());
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_category()
    {
        $id = 3;
        $response = $this->getJson("/api/categories/$id");
        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_category()
    {
        $faker = Factory::create();
        $response = $this->postJson("/api/categories", [
            'name' => $faker->name
        ]);
        $response->assertStatus(201);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_update_category()
    {
        $id = 8;
        $response = $this->putJson("/api/categories/$id", [
            'name' => 'Test'
        ]);
        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_delete_category()
    {
        $id = 8;
        $response = $this->deleteJson("/api/categories/$id");
        $response->assertStatus(200);
    }

}
