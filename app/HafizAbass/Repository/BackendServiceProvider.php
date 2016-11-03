<?php

namespace HafizAbass;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
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

        $this->app->bind('HafizAbass\Contract\DbContractInterface', 'HafizAbass\Contract\DbContractRepository');
                
        $this->app->bind('HafizAbass\Contract\ContractSection', 'HafizAbass\Contract\ContractSection');
    }
}
