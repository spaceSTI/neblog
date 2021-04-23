<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserArticleController;
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
Route::get('/', [MainController::class, 'index'])->name('site-index');

Route::get('/contacts', function () {
    return view('contacts');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('search', [SearchController::class, 'search'])->name('search-form');

Route::get('{id}', [UserArticleController::class, 'view'])
    ->where('id', '\d+')
    ->name('view-article');


/**
 * Admin zone
 */

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('admin', [DashboardController::class, 'index'])->name('admin-dashboard');

Route::get('admin/title-list', [ArticleController::class, 'titleList'])->name('admin-title-list');


Route::get('/admin/articles', [ArticleController::class, 'index'])->name('admin-article-list');
Route::get('admin/add-article', [ArticleController::class, 'addNew'])->name('admin-article-form');
Route::post('admin/add-article', [ArticleController::class, 'create']);

Route::get('admin/edit-article/{id}', [ArticleController::class, 'edit'])
    ->where('id', '\d+')
    ->name('admin-edit-article');

Route::post('admin/edit-article/{id}', [ArticleController::class, 'update'])->where('id', '\d+');

Route::get('admin/{id}', [ArticleController::class, 'item'])
    ->where('id', '\d+')
    ->name('admin-view-article');

