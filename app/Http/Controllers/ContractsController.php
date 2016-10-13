<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use HafizAbass\Contract\DbContractInterface;
use Illuminate\Http\Request;

require_once app_path('bigml/bigml.php');

class ContractsController extends Controller
{



	private $contract;


	function __construct(DbContractInterface $contract){

		$this->contract = $contract;

	}


	public function index()
	{
		
		$api = new \BigML("hafizmakten", "77fa9dfb830cef2f08eec29d1cbb93919b23dd3f", true, public_path().'/data');
		$source = $api->create_source(public_path().'/data/iris.csv');
		$dataset = $api->create_dataset($source);
		$model = $api->create_model($dataset);
		$prediction = $api->create_prediction($model, array('sepal length'=> 5, 'sepal width'=> 2.5));

		$objective_field_name = $prediction->object->fields->{$prediction->object->objective_fields[0]}->name;


		return response()->json($objective_field_name);


		$contract = $this->contract->getAll();
		// dd($api);
	}

	public function show()
	{
		dd($this->contract->findById(1));
	}


	public function edit(){}
	public function delete(){}
	public function update(){}
}
