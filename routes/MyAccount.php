<?php

Route::group(['prefix' => '/dashboard'], function (){
    Route::get('account', "AccountController@index");
    Route::post('account', "AccountController@saveData");
    Route::get('account/password', 'AccountController@passEdit');
    Route::post('account/password', 'AccountController@passUpdate');
});