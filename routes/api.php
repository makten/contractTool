<?php

use Illuminate\Http\Request;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


Route::post('testEndPoint', 'ContractsController@testEndPoint');

/*
| Form Section Routes
|
 */
// Route::post('storeAlgemeen', 'ContractsController@storeAlgemeen');
Route::post('storeAlgemeen', 'API\ContractsController@storeAlgemeen');
