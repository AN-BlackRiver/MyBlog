<?php

use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Post\PostController;
use App\Http\Controllers\Admin\Tag\TagController;
use App\Http\Controllers\Admin\User\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::namespace('App\Http\Controllers\Blog')->group(function () {
    Route::get('/', 'IndexController');
});


Route::namespace('App\Http\Controllers\Personal')->prefix('personal')->middleware(['auth', 'verified'])->group(
    function () {
        Route::namespace('Main')->group(function () {
            Route::get('/', 'IndexController')->name('personal.index');
        });

        Route::namespace('Like')->group(function () {
            Route::get('/likes', 'LikeController')->name('personal.like');
        });

        Route::namespace('Like')->group(function () {
            Route::delete('/likes{post}', 'LikeDestroyController')->name('personal.like.destroy');
        });

        Route::namespace('Comment')->prefix('comments')->group(function () {
            Route::get('/', 'CommentController')->name('personal.comments');
            Route::get('/{comment}', 'CommentShowController')->name('personal.show.comments');
            Route::patch('/{comment}', 'CommentUpdateController')->name('personal.update.comments');
            Route::delete('/{comment}', 'CommentDestroyController')->name('personal.destroy.comments');
        });
    }
);


Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->middleware(['auth', 'admin', 'verified'])->group(
    function () {
        Route::namespace('Main')->group(function () {
            Route::get('/', 'IndexController')->name('admin.index');
        });

        Route::resource('categories', CategoryController::class);

        Route::resource('tags', TagController::class);

        Route::resource('posts', PostController::class);

        Route::resource('users', UserController::class);
    }
);


Auth::routes(['verify' => true]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
