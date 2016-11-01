<?php 

namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use HafizAbass\Contract\DbContractInterface;


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


	public function store(Request $request)
	{
		// Validate with Algemeen en call it's store
		// 
		// $section = ;

		// dd($section);

		return $this->contract->persist($request->all());
		
		// dd($request->all());
	}
}