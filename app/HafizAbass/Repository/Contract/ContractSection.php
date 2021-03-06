<?php 

namespace HafizAbass\Contract;

use App\Contract;


/**
* Store contract section		
*/
class ContractSection
{

	public $contract;
	public $attributes;
	
	function __construct($attributes, Contract $contract)
	{
		$this->attributes = $attributes;
		$this->contract = $contract;
	}

	
	public function persist()
	{			

		return 	response()->json($this->contract
				->update([

				$this->sectionName() => $this->getFields()

				]));

	}



	private function sectionName()
	{
		return $this->attributes->get('section_name');
	}


	private function getFields()
	{
		return $this->attributes->except(['errors']);
	}
}