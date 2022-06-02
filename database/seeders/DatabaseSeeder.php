<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;
use Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategorySeeder::class);
        News::factory(10)->create();
    }
}
