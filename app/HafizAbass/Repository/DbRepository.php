<?php

namespace HafizAbass;


abstract DbRepository {

	public function getById($id)
	{
		$this->model->find($id);
	}
	
}