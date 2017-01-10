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

Route::get('/users', function (Request $request) {
    return \borg\User::all();
})->middleware('auth:api');

/**
 * Rotas para a administração de usuários!
 */
Route::get('/users/{action}', 'Api\AccountsController@list')->middleware(['auth:api', 'role:admin']);
Route::put('/users/status/{id}', 'Api\AccountsController@status')->middleware(['auth:api', 'role:admin']);
Route::delete('/users/{id}', 'Api\AccountsController@delete')->middleware(['auth:api', 'role:admin']);

/**
 * Rotas para administração de produtos
 */
Route::get('/products', 'Api\ProductsController@index')->middleware(['auth:api', 'role:admin']);
Route::delete('/products/{id}', 'Api\ProductsController@delete')->middleware(['auth:api', 'role:admin']);