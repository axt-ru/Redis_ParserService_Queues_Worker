<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    protected $model = News::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this -> faker->realText(15),
            'text' => $this -> faker->realText(rand(100,600)),
            'isPrivate' => false,
            'image' => null
        ];
    }
}
