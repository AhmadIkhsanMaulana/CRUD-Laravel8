<?php

use App\Http\Controllers\Services\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'auth'], function () {

    Route::post('/', ['as' => 'login', 'uses' => 'Services\AuthController@login']);
    Route::delete('/', ['as' => 'logout', 'uses' => 'Services\AuthController@logout']);
});

Route::group(['namespace' => 'App\Http\Controllers\Services', 'middleware' => 'auth'], function () {

    Route::get('/me', ['as' => 'me', 'uses' => 'UserController@me']);


    Route::group(['prefix' => 'classes'], function () {
        Route::get('/', ['as' => 'class-index', 'uses' => 'ClassController@index']);
        Route::post('/', ['as' => 'class-create', 'uses' => 'ClassController@create']);
        Route::get('/{classesId}', ['as' => 'class-show', 'uses' => 'ClassController@show']);
        Route::patch('/{classesId}', ['as' => 'class-update', 'uses' => 'ClassController@update']);
        Route::delete('/{classesId}', ['as' => 'class-delete', 'uses' => 'ClassController@delete']);
    });
});
