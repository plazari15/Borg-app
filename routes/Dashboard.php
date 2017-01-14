<?php

Route::get('itens', 'ItensController@index');
Route::get('itens/create', 'ItensController@create');
Route::post('itens/create', 'ItensController@store');
Route::get('itens/edit/{id}', 'ItensController@edit');
Route::post('itens/edit/{id}', 'ItensController@update');