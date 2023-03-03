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
use App\Http\Controllers\Admin\SourcesController as AdminSourcesController;
use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

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

Route::group(['middleware' => 'auth'], static function () {
    Route::group(['prefix' => 'account', 'as' => 'account'], static function () {
        Route::get('/', AccountController::class)->name('.home');
        Route::get('/logout', [LoginController::class, 'logout'])->name('.logout');
    });

    //admin routes
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is.admin'], static function () {
        Route::get('/', AdminController::class)->name('index');
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('news', AdminNewsController::class);
        Route::resource('sources', AdminSourcesController::class);
        Route::resource('users', AdminUserController::class);
    });
});

Route::resource('news', NewsController::class);
//Route::group(['prefix' => 'news'], static function() {
//    Route::get('/', [NewsController::class, 'index'])->name('news.index');
//    Route::get('/{id}', [NewsController::class, 'show'])->name('news.one');
//});

Route::resource('categories', CategoryController::class);
//Route::name('categories.')
//    ->prefix('categories')
//    ->group(function () {
//        Route::get('/', [CategoryController::class, 'index'])
//            ->name('index');
//        Route::get('/{category}', [CategoryController::class, 'show'])
//            ->name('one');
//    });

Route::resource('feedback', FeedbackController::class);
Route::resource('subscription', SubscriptionController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
