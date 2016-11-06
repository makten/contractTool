<?php

namespace App;

use App\Company;
use App\Debiteur;
use HafizAbass\Contract\ContractSection;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Laravel\Scout\Searchable;

class Contract extends Eloquent
{

	// use Searchable;


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


	public function companies()
	{
		return $this->hasMany(Company::class);
	}
}
