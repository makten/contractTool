<?php

namespace HafizAbass;

use App\User;


class UserSettings

{	


	protected $user;
	
	//user settings
	protected $settings = [];

	//Allowed settings
	// protected $allowed = [];


	

	function __construct(array $settings, User $user)
	{	
		$this->settings = $settings;

		// $this->allowed = array_keys($settings); //Get keys from user settings

		$this->user = $user;
	}




	/**
	 * Get a specific setting based on key
	 * 
	 */
	
	public function get($Key) 
	{

		return array_get($this->settings, $Key);

	}


	/**
	 * Set a given key/value if it does not already exist
	 * Add it to the allowed array
	 * 
	 */

	public function set($key, $value) 
	{

		// if ( ! $this->has($key)) {

		// 	$this->allowed[] = $key;
		// }

		$this->settings[$key] = $value;

		$this->persist();

	}



	/**
	 * Check if the given key exists in settings array
	 * 
	 */

	public function has($Key) 
	{

		return array_key_exists($key, $this->settings);

	}



	/**
	 * REturn all user settings
	 * 
	 */

	public function all ()
	{

		return $this->settings;

	}


	/**
	 * Merge given settings ($attributes) with existing user settings (update)
	 * 
	 */

	public function merge(array $attributes)
	{

		

		$this->settings = array_merge( 

			$this->settings,
			array_only($attributes, array_keys($this->settings))//Take only keys found in settings array

			); //Merge new settings with existing ones


		//Update user settings
		return $this->persist();

	}



	/**
	 * Perform the actual update to database
	 * 
	 */

	public function persist(){

		return $this->user->update(['settings' => $this->settings]);
	}


	/**
	 * 	Check if key is a prop of this class, if so return it
	 */

	public function __get($key)
	{

		if ( $this->has($key))
		{
			return $this->get($key);
		}

		//Else throw exception
		
		throw new Exception("The { $key} setting does not exist.");
	

	}


}