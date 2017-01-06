<?php

Route::group(['prefix' => '/dashboard'], function (){
    Route::get('account', "AccountController@index");
    Route::post('account', "AccountController@saveData");
});