<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index() {
        return view('admin.index', [
            'news' => News::all()
        ]);
    }

    public function create(News $news) {

        return view('admin.create',[
            'news' => $news,
            'categories' => Category::all()
        ]);
    }

    public function store(NewsRequest $request, News $news) {

        $request->validated();

        $url = null;
        if ($request->file('image')) {
            $path = Storage::putFile('public/img', $request->file('image'));
            $url = Storage::url($path);
        }

        $news->image = $url;
        $news->fill($request->all())->save();

        if($news) {
            return redirect()->route('news.show', $news->id)
                ->with('success', __('message.admin.news.create.success'));
        }
        return back()->with('error', __('message.admin.news.create.fail'));
    }

    public function update(NewsRequest $request, News $news) {

        $request->flash();
        $url = null;
        if ($request->file('image')) {
            $path = Storage::putFile('public/img', $request->file('image'));
            $url = Storage::url($path);
        }

        $news->image = $url;
        $news->fill($request->all())->save();


        return redirect()->route('news.show', $news->id)->with('success', __('message.admin.news.update.success'));
    }

    public function destroy(News $news) {
        $news->delete();
        return redirect()->route('admin.index')->with('success', __('message.admin.news.destroy.success'));
    }

    public function edit(News $news) {

        return view('admin.create',[
            'news' => $news,
            'categories' => Category::all()
        ]);
    }

}
