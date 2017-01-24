<?php

Route::get('itens', 'ItensController@index');
Route::get('itens/create', 'ItensController@create');
Route::post('itens/create', 'ItensController@store');
Route::get('itens/edit/{id}', 'ItensController@edit');
Route::post('itens/edit/{id}', 'ItensController@update');

Route::get('mercado', 'Dashboard\MarketController@index');
Route::post('mercado/add', 'Dashboard\CartController@addItem');
Route::get('mercado/cart', 'Dashboard\CartController@cart');
Route::get('mercado/delete/{rowId}', 'Dashboard\CartController@cartDelete');
Route::get('mercado/item/{id}', 'Dashboard\MarketController@itemView');