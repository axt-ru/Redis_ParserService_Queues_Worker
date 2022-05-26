<?php

namespace App\Models;

use Faker\Factory;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'slug', 'image', 'author', 'description' ];

    public function category() {
        return $this->belongsTo(Categories::class);
    }
}
