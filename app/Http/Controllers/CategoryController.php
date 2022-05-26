<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(Categories $categories) {

       return view('news.categories', [
            'categories' => Categories::all()
        ]);
    }

    public function show($slug) {

        $category = Categories::query()->where('slug', $slug)->first();

        // $news = News::query()->where('category_id', $category->id)->get();

        return view('news.category', [
            'category' => $category->title,
            'news' => $category->slug
        ]);

//        return view('news.category', [
//            'category' => $categories->getCategoryNameBySlug($slug),
//            'news' => $news->getNewsByCategorySlug($slug)
//        ]);
    }
}
