<?php
/**
 * Created by PhpStorm.
 * User: plazari
 * Date: 10/01/17
 * Time: 00:28
 */

Route::get('account/listar', 'Admin\Accounts@lists');
Route::get('account/aguardando', 'Admin\Accounts@waiting');
Route::get('account/reprovadas', 'Admin\Accounts@denided');
Route::get('account/{id}', 'Admin\Accounts@edit');
Route::post('account/{id}', 'Admin\Accounts@update');