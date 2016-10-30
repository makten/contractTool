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
            $table->string('mannr');
            $table->string('contractNaam');
            $table->string('meervest')->nullable();
            $table->json('vestigingen')->nullable();
            $table->string('imtech');
            $table->string('imtechconnr');
            $table->string('contractType');
            $table->boolean('algemeen_complete')->default(0);

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