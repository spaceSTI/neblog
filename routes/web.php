<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PublicArticleController;
use Illuminate\Support\Facades\Route;

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
/**
 * User zone
 */
Route::get('/', [PublicArticleController::class, 'index'])->name('site-index');

Route::get('{id}', [PublicArticleController::class, 'item'])
    ->where('id', '\d+')
    ->name('view-article');

Route::get('print/{id}', [PublicArticleController::class, 'printArticle'])
    ->where('id', '\d+')
    ->name('print-article');

Route::get('search', [SearchController::class, 'search'])->name('search-form');

/**
 * Static pages
 */

Route::get('contacts', function () {
    return view('contacts');
});

Route::get('about', function () {
    return view('about');
});

/**
 * Admin zone
 */

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('admin')->group(function () {
    Route::get('/articles', [ArticleController::class, 'index'])->name('admin-article-list');
    Route::get('/add-article', [ArticleController::class, 'addNew'])->name('admin-article-form');
    Route::post('/add-article', [ArticleController::class, 'create']);

    Route::get('/edit-article/{id}', [ArticleController::class, 'edit'])
        ->where('id', '\d+')
        ->name('admin-edit-article');

    Route::post('/edit-article/{id}', [ArticleController::class, 'update'])->where('id', '\d+');

    Route::get('/{id}', [ArticleController::class, 'item'])
        ->where('id', '\d+')
        ->name('admin-view-article');

});
/**
 * User register zone
 */
Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('register', [RegisterController::class, 'userCreate'])->name('user.create');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
