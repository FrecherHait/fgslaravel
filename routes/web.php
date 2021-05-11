<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestTestController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'App\Http\Controllers\Movie', 'prefix' => 'movie'],
    function() {
        $methods = ['index', 'edit', 'store', 'update', 'create',];
        Route::resource('movie','MovieController')->Only($methods)->names('movie.pages');
    });

Route::group(['namespace' => 'App\Http\Controllers\Movie', 'prefix' => 'movie'],
    function(){
        $methods = ['index', 'show', 'page',];
        Route::resource('page','MovieCategoryController')->Only($methods)->names('movie.pages');
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
