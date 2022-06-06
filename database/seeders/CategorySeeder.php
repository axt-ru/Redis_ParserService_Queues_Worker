<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            [
                "title" => "Экономика",
                "slug" => "economy"
            ],
            [
                "title" => "Погода",
                "slug" => "weather"
            ],
            [
                "title" => "Спорт",
                "slug" => "sport"
            ],
            [
                "title" => "Общество",
                "slug" => "society"
            ],
            [
                "title" => "Авто",
                "slug" => "auto"
            ]
        ];

        DB::table('categories')->insert($category);
    }
}
