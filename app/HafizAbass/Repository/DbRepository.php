<?php

namespace HafizAbass;


abstract class DbRepository {


	

	public function findById($id)
	{
		return response()->json($this->model->find($id));		
	}
	
}