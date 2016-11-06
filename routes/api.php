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
Route::post('storeSection', 'API\ContractsController@store');
Route::get('getSection/{id}', 'API\ContractsController@find');

Route::post('companysearch/', function(Request $request){

	

	return App\Debiteur::where('naam', 'like', '%'.$request->search.'%')->limit(10)->get();
	// return App\Contract::search($request->search)->get();

});

Route::post('/contractcompany/{contract_id}', 'CompanyController@addCompany');

