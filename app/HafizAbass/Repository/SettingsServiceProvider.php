<?php

namespace HafizAbass;

use App\User;
use Illuminate\Support\ServiceProvider;

class SettingsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        //Create a singleton to avoid object being created anytime settings is being call
        
        $this->app->singleton('HafizAbass\UserSettings', function () {

             //return authenticated user settings (To be changed when auth is ready)
             //Auth::user()->settings();
            return User::first()->settings();

        });


    }
}
