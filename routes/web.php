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
        Route::get('/', function () {
            return view('class.index');
        });
    });
});
