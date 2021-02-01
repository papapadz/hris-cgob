<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeLicenseNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_license_numbers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('emp_id',20);
            $table->bigInteger('license_id');
            $table->string('licenseno',50);
            $table->date('issuedate');
            $table->date('expirydate')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_license_numbers');
    }
}
