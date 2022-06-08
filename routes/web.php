<?php


use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Account\IndexController as AccountController;

use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialController;
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
Route::match(['get', 'post'], '/profile', [ProfileController::class, 'update'])->name('updateProfile');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/account', AccountController::class)
        ->name('account');
// routes - admin's
Route::name('admin.')
    ->prefix('admin')
    ->middleware(['auth', 'is_admin'])
    ->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('updateUsers');
        Route::get('/users/toggleAdmin/{user}', [UserController::class, 'toggleAdmin'])->name('toggleAdmin');
        Route::get('/', [AdminNewsController::class, 'index'])->name('index');
        Route::get('/test1', [AdminController::class, 'test1'])->name('test1');
        Route::get('/test2', [AdminController::class, 'test2'])->name('test2');
        Route::get('/parser', ParserController::class)->name('parser');
        Route::resource('/news', AdminNewsController::class)->except('show');
    });
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

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::post('logout', [LoginController::class, 'logout']);

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::group(['middleware' => 'guest'], function() {
    Route::get('/auth/{driver}/redirect', [SocialController::class, 'redirect'])
        ->where('driver', '\w+')
        ->name('social.redirect');
    Route::any('/auth/{driver}/callback', [SocialController::class, 'callback'])
        ->where('driver', '\w+')
        ->name('social.callback');
});

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
