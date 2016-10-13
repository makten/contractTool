<?php
namespace HafizAbass\Contract;

use App\Contract;
use HafizAbass\Contract\DbContractInterface;
use HafizAbass\DbRepository;

class DbContractRepository extends DbRepository implements DbContractInterface {


	public $model;



	function __construct(Contract $model){

		$this->model = $model;
	}


	public function getAll()
	{		
		return 'Getting all contracts using eloquent';
	}


}