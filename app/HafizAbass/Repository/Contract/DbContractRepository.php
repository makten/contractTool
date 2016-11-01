<?php
namespace HafizAbass\Contract;

use App\Contract;
use HafizAbass\Contract\DbContractInterface;
use HafizAbass\DbRepository;
use Validator;
use Illuminate\Http\Response;

class DbContractRepository extends DbRepository implements DbContractInterface {


	public $model;



	function __construct(Contract $model){

		$this->model = $model;
	}


	public function getAll()
	{		
		return 'Getting all contracts using eloquent';
	}


	public function persist($section)
	{
		// Check form section
		// Apply required rules
		// Validate
		// Persist
		// Check for redirect
		// Return to redirect or back with response
		
				
		if ( $this->shouldValidate($section) ){

			$validator = $this->validate($section);

			if ($validator->fails()){			

				return response($validator->errors()->all(), 303);
			}
		}
		
		
		
		// return $this->model->create($section);
	}

	

	public function validate($input)
	{
		return Validator::make($input, $this->rules(), $this->messages());
	}


	public function shouldValidate($section) 
	{

		return $section['sectionName'] === 'algemeen' ? true : false;
	}


	/**
	 * Validation rule for algemeen section only
	 */

	public function rules()
	{

		return [

		'contractVoorDerde' => 'required',
		'mannr' => 'required_if:contractVoorDerde,ja',
		'contractnaam' => 'required|unique:contracts|max:255',
		'meervest' => 'required',
		'imtech' => 'required',
		'imtechconnr' => 'required_if:imtech,ja',
		'contractType' => 'min:1'

		];

	}


	/**
	 * Validation messages
	 */
	
	public function messages()
	{

		return [

		'required' => ':attribute is verplict',
		'required_if' => ':attribute is verplict',
		'unique' => 'Er bestaat al een contract met deze naam',		
		'min' => 'Selecteer contractType',
		'max' => ':attribute heeft te veel karakters'

		];
	}


}