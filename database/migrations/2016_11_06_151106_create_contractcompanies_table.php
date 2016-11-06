<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractcompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function(Blueprint $table){

            $table->integer('debnr');
            $table->string('naam');
            $table->string('kvk');
            $table->string('adres');
            $table->string('postcode');
            $table->string('plaats');
            $table->integer('contract_id')->unsigned();

            $table->foreign('contract_id')->references('id')
                    ->on('contracts')
                    ->onDelete('cascade');

            $table->primary(['debnr', 'contract_id']);

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('companies');
    }
}
