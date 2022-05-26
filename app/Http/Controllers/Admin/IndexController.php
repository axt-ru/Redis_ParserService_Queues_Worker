<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class IndexController extends Controller
{
    public function index() {
        return view('admin.index');
    }

    public function test1(News $news){

        //return view('admin.test1');
        return response()
            ->json($news->getNews())
            ->header('Content-Disposition', 'attachment; name="json.txt"')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    public function test2(){

        return response()->download('chess-board.jpg');
        //return view('admin.test2');
    }

    public function test3(Request $request, Categories $categories, News  $news){
        if ($request->isMethod('post')) {
            $data = $request->except('_token');

            $json = ($data['category_id'] == 0)? $news->getNews() : $news->getNewsByCategoryId($data['category_id']);

            if ($data['formatData'] == 'xlsx') {
                $export = new NewsExport($json);
                return Excel::download($export, 'invoices.xlsx');
            }

            if ($data['formatData'] == 'json') {
                return response()
                    ->json($json)
                    ->header('Content-Disposition', 'attachment; name="json.txt"')
                    ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
            }

        }

        return view('admin.test3', [
            'categories' => $categories->getCategories(),
        ]);
    }

    public function create(Request $request, Categories $categories, News $news) {
        if ($request->isMethod('post')) {
            $request->flash();

            //Получаем данные из формы и из файла
            $addedNews = $request->except('_token');
            $getNews = $news->getNews();

            //Влидируем поля формы
            if (in_array(null, $addedNews)) {
                return redirect()->route('admin.create');
            }

            // Добавляем элемент в массив
            $getNews[] = [
                'id' => '',
                'title' => $addedNews['title'],
                'text' => $addedNews['text'],
                'isPrivate' => isset($addedNews['isPrivate']),
                'category_id' =>$addedNews['category_id']
            ];

            // Получаем последний ключь добавленного элемена
            $lestkey = array_key_last($getNews);

            // Добовляем ключи ID
            $getNews[$lestkey]['id'] = $lestkey;

            // Перезаписываем файл
            File::put(
                storage_path() . '/news.json',
                json_encode($getNews), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
            );

            // Редиректимся на новость
            return redirect()->route('news.one', $lestkey);
        }

        return view('admin.create', [
            'categories' => $categories->getCategories(),
        ]);
    }

//            $arr = $request->except('_token');
//
////            $url = null;
////            if ($request->file('image')) {
////                $path = Storage::putFile('public/img', $request->file('image'));
////                $url = Storage::url($path);
////            }
//
//            $data = $news->getNews();
//            $data[] = $arr;
//            $id = array_key_last($data);
//            $data[$id]['id'] = $id;
//
//            // File::put(storage_path() . '/order.json', json_encode($arr, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
//
//            File::put(storage_path() . '/news.json', json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
//
//            return redirect()->route('news.show', $id)->with('success', 'Новость добавлена');
//
//            //dd($data);
//
//            //TODO добавить в массив
//            //TODO сохранить заказ пользователя в файл в json
//            //return redirect()->route('order');
//        }
//
//        return view('admin.create',[
//            'categories' => $categories->getCategories()
//        ]);
//    }
//

}
