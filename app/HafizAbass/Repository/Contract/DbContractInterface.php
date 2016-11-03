<?php

namespace HafizAbass\Contract;

interface DbContractInterface {


	public function getAll();	

	// public function persist();

	public function rules();

	public function validate($input);

	public function shouldValidate($section);

}