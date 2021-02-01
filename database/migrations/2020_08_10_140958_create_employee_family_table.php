<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeFamilyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_family', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('emp_id',20);
            $table->string('lastname',50);
            $table->string('firstname',50);
            $table->string('middlename',50)->nullable();
            $table->string('extension',10);
            $table->date('birthdate');
            $table->bigInteger('address_id');
            $table->string('contact',50)->nullable();
            $table->string('occupation',50)->nullable();
            $table->bigInteger('workaddress_id')->nullable();
            $table->integer('type');
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
        Schema::dropIfExists('employee_family');
    }
}
