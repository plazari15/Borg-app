<?php

Route::get('itens', 'ItensController@index');
Route::get('itens/create', 'ItensController@create');
Route::post('itens/create', 'ItensController@store');