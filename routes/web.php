<?php



// App::bind('App\HafizAbass\Repository\Contract\DbContractInterface', 'App\HafizAbass\Repository\Contract\DbContractRepository');

use App\User;
use Illuminate\Http\Request;



Route::get('/', function (Request $request) {
	// dd($request->server());
	// 
	return view('dashboard.contractCreate');

});


Route::get('settings', function(){

	
	
	settings()->merge(['foo' => 'Something new perhads!!!']);
	// settings()->set('foo', 'Good news turn bad');
	// settings()->get('foo');
	
	

	return settings()->all();




});

Auth::routes();

// Route::get('/home', 'HomeController@index');

// Route::resource('contracts', 'ContractsController');
