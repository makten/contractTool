<?php

namespace App;

use HafizAbass\UserSettings;
use Laravel\Scout\Searchable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'settings'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [

            'settings' => 'json', //json_decode('settings');

    ];


    public function settings(){

        return new UserSettings($this->settings, $this);
    }
}
