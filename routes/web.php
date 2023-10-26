<?php

use App\Http\Controllers\Admin\Category\StoreController;
use App\Http\Controllers\Blog\IndexController;
use App\Http\Controllers\Admin\Main\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\Category\IndexController as AdminCategoryController;
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
    Route::get('/', IndexController::class);
});

Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->group(function () {
    Route::namespace('Main')->group(function () {
        Route::get('/',AdminIndexController::class)->name('admin.index');
    });
    Route::namespace('Category')->prefix('category')->group(function () {
        Route::get('/',AdminCategoryController::class)->name('admin.category');
        Route::post('/', StoreController::class)->name('admin.store');
    });
});

Auth::routes();


