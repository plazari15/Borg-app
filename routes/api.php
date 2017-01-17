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

Route::get('/token/{id}', function ($id) {
    return \borg\User::find($id)->api_token;
});

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

/**
 * Rotas para Edição de Itens (Dashboard)
 */
Route::get('myitens', 'Api\ItensController@index')->middleware(['auth:api', 'role:fornecedor']);
Route::delete('myitens/{id}', 'Api\ItensController@delete')->middleware(['auth:api', 'role:fornecedor']);


/**
 * Rotas Administrativas para Itens
 */
Route::get('itens', 'Api\Admin\ItensController@index')->middleware(['auth:api', 'role:admin']);
Route::delete('itens/{id}', 'Api\Admin\ItensController@delete')->middleware(['auth:api', 'role:admin']);

/**
 * Rotas Administrativas para compras
 */
Route::get('orders', 'Api\Admin\OrdersController@index')->middleware(['auth:api', 'role:admin']);
Route::put('orders/{id}', 'Api\Admin\OrdersController@update')->middleware(['auth:api', 'role:admin']);