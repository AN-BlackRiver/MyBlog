<?php

use App\Http\Controllers\Blog\IndexController;
use App\Http\Controllers\Admin\Main\IndexController;
use App\Http\Controllers\Category\IndexController;
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

Route::group(['namespace' => 'App\Http\Controllers\Blog'], function () {
    Route::get('/', 'IndexController');
});

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin'],function (){
        Route::group(['namespace'=>'Main'],function () {
            Route::get('/', 'IndexController');
        });

        Route::group(['namespace'=>'Category'],function () {
            Route::get('/', 'IndexController');
        });
});



Auth::routes();


