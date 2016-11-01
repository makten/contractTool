<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Contract extends Eloquent
{
    

    protected $casts = [
    	'vestigingen' => 'json',
    ];


    protected $guarded = ['errors', 'redirect'];
}
