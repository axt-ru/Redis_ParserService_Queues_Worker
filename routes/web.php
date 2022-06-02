<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\AdminCategoryController as AdminCategoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, 'index'])->name('home');


Route::name('news.')
    ->prefix('news')
    ->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('index');
        Route::get('/one/{id}', [NewsController::class, 'show'])->name('show');
        Route::name('category.')
            ->group(function () {
                Route::get('/categories', [CategoryController::class, 'index'])->name('index');
                Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('show');
            });

    });


Route::name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', [AdminNewsController::class, 'index'])->name('index');
        Route::get('/test1', [AdminController::class, 'test1'])->name('test1');
        Route::get('/test2', [AdminController::class, 'test2'])->name('test2');
        Route::resource('/news', AdminNewsController::class)->except('show');
    });

Route::get('/categories', [AdminCategoryController::class, 'showCategories'])->name('showCategories');
Route::get('/categories/create', [AdminCategoryController::class, 'create'])->name('create');
Route::delete('/categories/{categories}', [AdminCategoryController::class, 'delCategory'])->name('delCategory');
Route::get('/categories/{categories}/edit', [AdminCategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{categories}', [AdminCategoryController::class, 'update'])->name('categories.update');
Route::post('/categories', [AdminCategoryController::class, 'store'])->name('categories.store');

Route::view('/about', 'about')->name('about');
Route::view('/feedback', 'feedback')->name('feedback');
Route::view('/order', 'order')->name('order');

/* Auth::routes(); */

//Route::get('/', function (){
//   return 'Это для тестирования приложения';
//});

