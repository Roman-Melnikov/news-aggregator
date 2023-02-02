<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\SubscriptionController;

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
Route::group(['prefix' => 'admin', 'as' => 'admin.'], static function(){
    Route::get('/', AdminController::class)->name('index');
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);
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

Route::resource('feedback', FeedbackController::class);
Route::resource('subscription', SubscriptionController::class);
