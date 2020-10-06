<?php

use Illuminate\Http\Request;

Route::post('/register', 'UserController@register');
Route::post('/login', 'UserController@login');

Route::group(['middleware' => ['jwt.verify']], function () 
{
    Route::group(['middleware' => ['api.superadmin']],function ()
    {
        Route::delete('/order/{id}', 'CustomerController@destroy');
        Route::delete('/Customer/{id}', 'CustomerController@destroy');
        Route::delete('/Product/{id}', 'CustomerController@destroy');

    });
    Route::group(['middleware' => ['api.admin']],function ()
    {
        Route::post('/Order', 'OrderController@store');
        Route::put('/Order', 'OrderController@Update');

        Route::post('/Product', 'ProductController@store');
        Route::put('/Product/{id}', 'ProductController@update');

        Route::post('/Customer', 'CustomerController@store');
        Route::put('/Customer/{id}', 'CustomerController@update');
    });


Route::get('/Order', 'OrderController@show');
Route::get('/Order/{id}', 'OrderController@detail');

Route::get('/Product', 'ProductController@show');
Route::get('/Product/{id}', 'ProductController@detail');

Route::get('/Customer', 'CustomerController@show');
Route::get('/Customer/{id}', 'CustomerController@detail');


});