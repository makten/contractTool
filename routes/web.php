<?php

//Create a singleton to avoid object being created anytime settings is being call (Move to service provider)
app()->singleton('HafizAbass\UserSettings', function () {

	//return authenticated user settings
	return App\User::first()->settings();
});




// App::bind('App\HafizAbass\Repository\Contract\DbContractInterface', 'App\HafizAbass\Repository\Contract\DbContractRepository');

use App\User;
use Illuminate\Http\Request;


function settings($key = null)

{

	$settings = app('\HafizAbass\UserSettings');

	return $key ? $settings->get($key) : $settings;

}



Route::get('/', function (Request $request) {
	// dd($request->server());
	// 
	return view('dashboard.contractCreate');

});


Route::get('settings', function(){
	
	// $request = array_only(\Request::all(), ['foo', 'bar']);// Get only specified arrays

	// $user = User::first();

	// $user->settings()->merge(Request::all());

	// $settings = array_merge($user->settings, $request);

	// $user->update(compact('settings'));
	// 
	
	settings()->set('alarm_on', true);
	settings()->set('notification_on', true);
	

	return settings()->all();




});

Auth::routes();

// Route::get('/home', 'HomeController@index');

// Route::resource('contracts', 'ContractsController');
