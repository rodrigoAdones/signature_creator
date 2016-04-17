<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Employees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('department');
            $table->string('position');
            $table->string('annex');
            $table->string('email')->email();
            $table->integer('company_id')->unsigned();
            $table->integer('branch_id')->unsigned();
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('branch_id')->references('id')->on('branches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('employees');
    }
}
