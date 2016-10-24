<?php

namespace HafizAbass;

use App\User;


class UserSettings

{	


	protected $user;
	
	//user settings
	protected $settings = [];

	//Allowed settings
	protected $allowed = [];



	function __construct(array $settings, User $user)
	{	
		$this->settings = $settings;

		$this->allowed = array_keys($settings); //Get keys from user settings

		$this->user = $user;
	}


	public function get($Key) 
	{

		return array_get($this->settings, $Key);

	}


	public function set($key, $value) 
	{

		if ( ! array_key_exists($key, $this->settings)) {

			$this->allowed[] = $key;
		}

		$this->settings[$key] = $value;

		$this->persist();

	}



	public function all ()
	{

		return $this->settings;

	}


	public function merge(array $attributes)
	{
		
		$settings = array_merge( 

			$this->settings,
			array_only($attributes, $this->allowed)

			); //Merge new settings with existing ones


		//Update user settings
		return $this->persist();

	}


	public function persist(){

		return $this->user->update(['settings' => $this->settings]);
	}


	/**
	 * 	Check if key is a prop of this class, if so return it
	 */

	public function __get($key)
	{

		if ( array_key_exists($Key, $this->settings))
		{
			return $this->get($key);
		}

		//Else throw exception
		
		throw new Exception("The { $key} setting does not exist.");
	

	}


}