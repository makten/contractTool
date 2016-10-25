<?php



function settings($key = null)

{	
	//Initialize singleton Settings instance
	
	$settings = app('\HafizAbass\UserSettings');


	// If a key is specified, get it else return all settings
	return $key ? $settings->get($key) : $settings;

}