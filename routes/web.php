<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\IndexController as AdminController;

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

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/info', function () {
    return view('info');
})->name('info');

//admin routes
Route::group(['prefix' => 'admin'], static function(){
    Route::get('/', AdminController::class)->name('admin.index');
});

Route::group(['prefix' => 'news'], static function() {
    Route::get('/', [NewsController::class, 'index'])->name('news.index');
    Route::get('/{id}', [NewsController::class, 'show'])->name('news.one');
});

Route::name('categories.')
    ->prefix('categories')
    ->group(function () {
        Route::get('/', [CategoryController::class, 'index'])
            ->name('index');
        Route::get('/{id}', [CategoryController::class, 'show'])
            ->name('one');
    });
