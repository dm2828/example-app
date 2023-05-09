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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */
    Route::get('/', 'CrudController@index')->name('crud.index');

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });

    Route::get('crud/create', [App\Http\Controllers\CrudController::class, 'create']);
    Route::post('crud', [App\Http\Controllers\CrudController::class, 'store']);
    Route::get('crud/{crud}/edit', [App\Http\Controllers\CrudController::class, 'edit']);
    Route::get('crud/{crud}', [App\Http\Controllers\CrudController::class, 'show']);
    Route::put('crud/{crud}', [App\Http\Controllers\CrudController::class, 'update']);
    Route::delete('crud/{crud}', [App\Http\Controllers\CrudController::class, 'destroy']);

});
