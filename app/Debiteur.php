<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Debiteur extends Eloquent
{

	protected $table = 'debiteuren';
	protected $primaryKey = 'debnr';

}
