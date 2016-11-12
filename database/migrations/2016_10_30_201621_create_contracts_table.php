<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table){

            $table->increments('id');
            $table->string('section_name');
            $table->string('contract_voorderde');
            $table->string('mannr');
            $table->string('contract_naam');
            $table->string('meervest');
            $table->json('vestigingen')->nullable();
            $table->string('imtech');
            $table->string('imtechconnr')->nullable();
            $table->string('contract_type');
            $table->text('algemeen_opmerking', 300)->nullable();
            
            $table->json('klantgegevens')->nullable();
            $table->json('contactgegevens')->nullable();
            $table->json('contractvorm')->nullable();
            $table->json('operationeel')->nullable();
            $table->json('financieel')->nullable();
                       
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
        Schema::drop('contracts');
    }
}
