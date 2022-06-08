<?php

namespace App\Services;

use Illuminate\Support\Str;

class NewsFormatService
{
    public static function format(array $newsList): array
    {
        # пока временно
        return collect($newsList)->map(function ($value) {
            return [
                'category_id'   => 1,
                'title'         => $value['title'],
                'text'          => $value['description'],
                'author'        => 'yandex_army',
                'slug'          => Str::slug('yandex-'.$value['title']),
            ];
        })->toArray();
    }

}
