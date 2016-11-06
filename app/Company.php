<?php

namespace App;

use App\Contract;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Company extends Eloquent
{
	protected $primaryKey = 'debnr';
	
	protected $fillable = ['debnr', 'contract_id', 'naam', 'kvk', 'adres', 'postcode', 'plaats'];


	public function companies()
	{

		return $this->belongsTo(Contract::class);
	}
}
