<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use HafizAbass\Contract\DbContractInterface;
use Illuminate\Http\Request;

class ContractsController extends Controller
{



	private $contract;


	function __construct(DbContractInterface $contract){

		$this->contract = $contract;



	}


	public function index()
	{
		$contract = $this->contract->getAll();
		dd($contract);
	}

	public function show()
	{
		dd($this->contract->findById(1));
	}


	public function edit(){}
	public function delete(){}
	public function update(){}
}
