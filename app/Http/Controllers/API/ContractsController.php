<?php 

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use HafizAbass\Contract\DbContractInterface;
// use HafizAbass\Contract\StoreAlgemeen;


/**
* Contract API endpoints
*/
class ContractsController extends Controller
{

	private $contract;	
	
	function __construct(DbContractInterface $contract)
	{

		$this->contract = $contract;		

	}


	public function storeAlgemeen()
	{
		// Validate with Algemeen en call it's store
		// 
		$algemeen = new \StoreAlgemeen();
		
		dd($algemeen->persist());
	}
}