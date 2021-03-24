<?php

namespace Database\Seeders;

use App\Models\Actor;
use App\Models\Category;
use App\Models\Movie;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Category::factory(3)->create();

        Movie::factory(5)
            ->hasAttached(Actor::factory()->count(5))
            ->create();
    }

}
