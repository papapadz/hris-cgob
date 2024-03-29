<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeePayrollGenerationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_payroll_generations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('employeepayroll_id');
            $table->bigInteger('payroll_generation_id');
            $table->decimal('value',7,2);
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
        Schema::dropIfExists('employee_payroll_generations');
    }
}
