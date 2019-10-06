<?php

use Illuminate\Http\Request;

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

Route::prefix('users')->name('users.')->group(function () {
    Route::get('/', 'User@list')->name('list');
    Route::post('/', 'User@create')->name('create');
    Route::patch('/{id}', 'User@edit')->name('edit');
    Route::get('/{id}', 'User@show')->name('show');
    Route::delete('/{id}', 'User@delete')->name('delete');
});
