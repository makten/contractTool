<?php

namespace HafizAbass;


abstract class DbRepository {


	

	public function findById($id)
	{
		return response()->json($this->model->find($id));

		return 'Found item by Id using eloquent';
	}
	
}