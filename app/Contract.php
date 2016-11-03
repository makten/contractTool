<?php

namespace App;

use HafizAbass\Contract\ContractSection;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Contract extends Eloquent
{


	// protected $fillable = [

	// 	'sectionName',
	// 	'contractVoorDerde',
	// 	'mannr',
	// 	'contractnaam',
	// 	'meervest',
	// 	'vestigingen',
	// 	'imtech',
	// 	'imtechconnr',
	// 	'contractType',
	// 	'algemeenOpmerking',
		
	// 	'klantgegevens',
	// 	'contactgegevens',
	// 	'contractvorm',
	// 	'operationee',
	// 	'financiee',
	// 	'installatie',
	// 	'verstuur',
	// ];

	 protected $casts = [

		'vestigingen' => 'json',
		'klantgegevens' => 'json',
		'contactgegevens' => 'json',
		'contractvorm' => 'json',
		'operationeel' => 'json',
		'financieel' => 'json',
		'installatie' => 'json',
		'verstuur' => 'json',

	];


	protected $guarded = ['errors', 'redirect'];


	public function mergeSection($section)
	{
		$contract = $this->where('id', $section->get('contractId'))->first();
		
		return new ContractSection($section, $contract);
	}
}
