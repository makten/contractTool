<?php

namespace HafizAbass\Contract;

interface DbContractInterface {


	public function getAll();

	public function rules();

	public function validate($input);

	public function shouldValidate($section);

}