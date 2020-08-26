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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/Order', 'OrderController@store');
Route::get('/Order', 'OrderController@show');
Route::delete('/order/{id}', 'CustomerController@destroy');

Route::post('/Product', 'ProductController@store');
Route::get('/Product', 'ProductController@show');
Route::put('/Product/{id}', 'ProductController@update');

Route::post('/Customer', 'CustomerController@store');
Route::get('/Customer', 'CustomerController@show');
Route::get('/Customer/{id}', 'CustomerController@detail');
Route::put('/Customer/{id}', 'CustomerController@update');
Route::delete('/Customer/{id}', 'CustomerController@destroy');
