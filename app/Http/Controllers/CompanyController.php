<?php

namespace App\Http\Controllers;

use App\Company;
use App\Contract;
use HafizAbass\Contract\DbContractInterface;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

	private $contract;


	function __construct(DbContractInterface $contract){

		$this->contract = $contract;
	}
   



   public function addCompany(Request $request, $contractId)
   {	


   		$company = Company::create([

   				'debnr' => $request->debnr,
   				'contract_id' => $contractId,
   				'naam' => $request->naam,
   				'kvk' => $request->kvk,
   				'adres' => $request->adres,
   				'postcode' => $request->postcode,
   				'plaats' => $request->plaats,

   			]);   		
   		
   		return response()->json($company);
   }
}
