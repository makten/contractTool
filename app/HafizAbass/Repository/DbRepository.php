<?php

namespace HafizAbass;


abstract class DbRepository {


	

	public function findById($id)
	{
		return $this->model->find($id);		
	}
	
}