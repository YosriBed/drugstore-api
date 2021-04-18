<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


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

Route::group(['middleware' => 'cors'], function () {
    Route::get('/', 'HomeController@index');
    Route::group(['prefix' => 'drugs'], function () {
        // Route::group(['middleware' => 'jwt.auth'], function () {
        Route::get('/', 'DrugController@index');
        Route::get('/{id}', 'DrugController@show');
        // });

    });
    Route::group(['prefix' => 'orders'], function () {
        // Route::group(['middleware' => 'jwt.auth'], function () {
        Route::get('/', 'OrderController@index');
        Route::get('/{id}', 'OrderController@show');
        Route::post('/', 'OrderController@store');
        // });
    });
    Route::group(['prefix' => 'categories'], function () {
        // Route::group(['middleware' => 'jwt.auth'], function () {
        Route::get('/', 'CategoryController@index');
        Route::get('/{id}', 'CategoryController@show');
        // });
    });
    Route::group(['prefix' => 'auth'], function () {
        Route::post('/login', 'AuthController@login');
        Route::post('/signup', 'AuthController@signup');
        Route::group(['middleware' => 'jwt.auth'], function () {
            Route::post('/logout', 'AuthController@logout');
            Route::post('/refresh', 'AuthController@refresh');
        });
    });
});
