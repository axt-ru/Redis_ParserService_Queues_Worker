<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LinksRequest;
use App\Models\Resourсe;
use Illuminate\Http\Request;

class RssLinkController extends Controller
{
    public function index() {
        $links = Resourсe::all();
        return view('admin.link', [
            'links' => $links
        ]);
  }
    public function create(Resourсe $links) {

        return view('admin.link',[
            'links' => $links,
        ]);
    }
        public function show() {
        return view('admin.link');
    }

    public function store(LinksRequest $request, Resourсe $links)
    {
        $request->validated();
        $links->fill($request->all())->save();
        if($links) {
            return redirect()->route('link.show', $links->id)
                ->with('success', __('message.admin.news.create.success'));
        }
        return back()->with('error', __('message.admin.news.create.fail'));
    }

    public function destroy(Resourсe $links) {
        $links->delete();
        return redirect()->route('admin.link', $links)->with('success', 'Ресурс (ссылка) для парсинга удалена');
    }

    public function edit(Resourсe $links) {
        $links = Resourсe::all();
        return view('admin.link',[
            'links' => $links
        ]);
    }

}
