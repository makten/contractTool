<?<?php 

namespace HafizAbass\Contract;

use HafizAbass\StoreContractRepository;


/**
* Store Algemeen implementation
*/

class StoreAlgemeen extends StoreContractRepository
{
	
	
	public function rules()
	{


	}

	public function validate()
	{


	}


	public function persist()
	{
		return 'storing algemeen';
	}
}