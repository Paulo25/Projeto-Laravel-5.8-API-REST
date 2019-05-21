<?php

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

Route::group(['prefix' => 'api'], function () {
    Route::group(['prefix' => 'user'], function (){

        Route::get('', 'Api\UserController@allUsers');
        Route::get('{id}', 'Api\UserController@getUser');

        Route::post('', 'Api\UserController@saveUser');

        Route::put('{id}', function ($id){
            return 'Atualizar o usuário de ID ' . $id;
        });

        Route::delete('{id}', function ($id){
            return 'Remove o usuário de ID '.$id;
        });
    });
});



