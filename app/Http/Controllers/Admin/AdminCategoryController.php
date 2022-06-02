<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\NewsRequest;

class AdminCategoryController extends Controller
{
    public function showCategories() {
        $categories = Category::paginate(5);
        return view('admin.categories', [
            'categories' => $categories,
        ]);
    }

    public function delCategory(Request $request, Category $categories) {
        $categories->delete();

        return redirect()->route('admin.showCategories')->with('success', 'Категория удалена вместе с новостями');
    }

    public function edit(Category $categories){
        return view('admin.categoryCreate',[
            'categories' => $categories,
        ]);
    }

    public function update(CategoryRequestUpdate $request, Category $categories){
        $request->flash();

        $categories->fill($request->all())->save();
        return redirect()->route('admin.showCategories', $categories->id)->with('success', 'Категория изменена');

    }

    public function create(Category $categories){

        return view('admin.categoryCreate', [
            'categories' => $categories,
        ]);
    }

    public function store(CategoryRequestCreate $request, Category $categories){
       //$request -> validate();
        $categories->fill($request->all())->save();
       // $request->validate($categories->rules(), [], $categories->attributeNames());

        return redirect()->route('admin.showCategories', $categories->id)->with('success', 'Категория добавлена');
    }

}


