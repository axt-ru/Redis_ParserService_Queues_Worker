<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
        //var_dump($this->getData());
    }

    private function getData() {
        $data =[];
        $faker = Faker\Factory::create('ru_RU');
        for ($i = 0; $i <= 10; $i++) {
            $data[]= [
                //'category_id'=> rand(1,5),
                'title' => $faker->realText(20,4),
                'slug' => $faker->slug,
                'author' => $faker->name,
                'image' => $faker->imageUrl,
                'description' => $faker->text(200)
            ];
        }
        return $data;
    }
}
