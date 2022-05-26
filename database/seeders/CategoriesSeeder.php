<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data = [
        [
            "title" => 'Спорт',
            'description' => 'sport'
        ],
        [
            'title' => 'Экономика',
            'description' => 'economy'
        ],
        [
            'title' => 'Общество',
            'description' => 'society'
        ],
        [
            'title' => 'Политика',
            'description' => 'politics'
        ],
        [
            'title' => 'Погода',
            'description' => 'weather'
        ]
       ];

       DB::table('categories') -> insert($data);

    }

}
