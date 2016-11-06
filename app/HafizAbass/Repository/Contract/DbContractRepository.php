<?php
namespace HafizAbass\Contract;

use App\Contract;
use HafizAbass\Contract\DbContractInterface;
use HafizAbass\DbRepository;
use Validator;
use Illuminate\Http\Response;
use Auth;

class DbContractRepository extends DbRepository implements DbContractInterface {


	public $model;
	private $contract;
	private $sectionName;



	function __construct(Contract $model){

		$this->model = $model;
	}


	public function getAll()
	{		
		return 'Getting all contracts using eloquent';
	}



	public function createOrMerge($section)
	{

		

		if ( $this->shouldValidate($section->all()) ){

			// $validator = $this->validate($section->all());

			// if ($validator->fails()){			

			// 	return response($validator->errors()->all(), 303);
			// }			


			return $this->model->updateOrCreate(
				['contract_naam' => $section->get('contract_naam')],					
				[
					'section_name' => $section->get('section_name'),
					'contract_voorderde' => $section->get('contract_voorderde'),
					'mannr' => $this->getMannr($section),
					'contract_naam' => $section->get('contract_naam'),
					'meervest' => $section->get('meervest'),
					'vestigingen' => $section->get('vestigingen'),
					'imtech' => $section->get('imtech'),
					'imtechconnr' => $section->get('imtechconnr'),
					'contract_type' => $section->get('contract_type'),
					'algemeen_opmerking' => $section->get('algemeen_opmerking'),
				]

				);

			
		}

		// dd($section);


		$contract = $this->model->mergeSection($section);

		$contract->persist();

	}


	/**
	 * [getMannr check availability of mannr or return default]
	 * @param  [type] $section [description]
	 * @return [type]          [description]
	 */
	public function getMannr($section)
	{
		return ! $section->has('mannr') ? 12554 : $section->get('mannr');
	}



	public function validate($input)
	{
		return Validator::make($input, $this->rules(), $this->messages());
	}


	public function shouldValidate($section) 
	{

		return $section['section_name'] === 'algemeen' ? true : false;
	}


	/**
	 * Validation rule for algemeen section only
	 */

	public function rules()
	{

		return [

		'contract_voorderde' => 'required',
		'mannr' => 'required_if:contract_voorderde,ja',
		'contract_naam' => 'required|unique:contracts|max:255',
		'meervest' => 'required',
		'imtech' => 'required',
		'imtechconnr' => 'required_if:imtech,ja',
		'contract_type' => 'min:1'

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
		'min' => 'Selecteer min 2',
		'max' => ':attribute heeft te veel karakters'

		];
	}


}