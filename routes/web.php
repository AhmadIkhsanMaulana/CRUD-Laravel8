<?php

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::group(['namespace' => 'App\Http\Controllers\Web'], function () {

    Route::post('/do-login', ['as' => 'do-login', 'uses' => 'HomeController@login']);

    Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'HomeController@dashboard']);

    Route::get('/menus', function () {
        return view('menu');
    });

    Route::group(['prefix' => 'classes'], function () {
        Route::get('/', ['as' => 'classes-index', 'uses' => 'ClassesController@index']);
        Route::get('/create', ['as' => 'classes-create', 'uses' => 'ClassesController@create']);
        Route::post('/store', ['as' => 'classes-store', 'uses' => 'ClassesController@store']);
        Route::get('/{classesId}', ['as' => 'classes-show', 'uses' => 'ClassesController@show']);
        Route::get('/{classesId}/edit', ['as' => 'classes-edit', 'uses' => 'ClassesController@edit']);
        Route::post('/{classesId}/store', ['as' => 'classes-store-update', 'uses' => 'ClassesController@storeUpdate']);
        Route::get('/{classesId}', ['as' => 'classes-delete', 'uses' => 'ClassesController@delete']);
    });
});
