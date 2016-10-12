<?php
namespace HafizAbass\Contract;

use App\Contract;

class DbContractRepository extends DbRepository implements ContractRepositoryInterface {

	private $model;

	function __construct(Contract $model){

		$this->model = $model;
	}

}