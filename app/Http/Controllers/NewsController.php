<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index(News $news)
    {
        //$news = DB::select('SELECT * FROM `news` WHERE 1');
        //dd($news);
        $news = DB::table('news') -> get(); // getAll
        return view('news.index')->with('news', $news);
    }

    public function show($id)
    {
        $news = DB::table('news') -> find($id);
        //dd($news);
        return view('news.one')->with('news', $news);;
    }
}
