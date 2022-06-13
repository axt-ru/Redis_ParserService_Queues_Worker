<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParsing;
use App\Models\News;
use App\Models\Resourсe;
use App\Queries\QueryBuilderNews;
use App\Services\XMLParserService;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    public function index(XMLParserService $parserService) {

        $links = Resourсe::all('link');
        $arrLinks = [];
        foreach ($links as $item) {
            $arrLinks[] = $item->link;
        }
        //dd($arrLinks);
        $start = microtime(true);

        foreach ($arrLinks as $link) {
            NewsParsing::dispatch($link);
            //$parserService->saveNews($link);
        }

        $end = microtime(true);
        dump($end - $start);

        return view('admin.index', [
            'news' => News::all()
        ]);


    }
}
