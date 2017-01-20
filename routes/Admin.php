<?php
/**
 * Created by PhpStorm.
 * User: plazari
 * Date: 10/01/17
 * Time: 00:28
 */

/**
 * Rotas para o painel administrativo
 */
Route::get('account/{status}', 'Admin\Accounts@lists')->where('status', '[A-Za-z]+');;
Route::get('account/{id}', 'Admin\Accounts@edit')->where('id', '[0-9]+');;
Route::post('account/{id}', 'Admin\Accounts@update');
//fdksn
/**
 * Visualizar Produtos
 */
Route::get('produtos', 'Admin\AdminProdutos@index');
Route::get('produtos/create', 'Admin\AdminProdutos@create');
Route::post('produtos/create', 'Admin\AdminProdutos@store');
Route::get('products/edit/{id}', 'Admin\AdminProdutos@edit');
Route::post('products/edit/{id}', 'Admin\AdminProdutos@update');

/**
 * Itens Admin
 */
Route::get('itens', 'Admin\ItensController@index');

Route::get('order/itens', 'Admin\OrderItensController@index');
Route::get('order/itens/export/{id}', 'Admin\OrderItensController@export');