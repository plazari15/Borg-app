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
Route::get('account/{status}', 'Admin\Accounts@lists');
Route::get('account/{id}', 'Admin\Accounts@edit');
Route::post('account/{id}', 'Admin\Accounts@update');