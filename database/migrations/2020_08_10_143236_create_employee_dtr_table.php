<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeDtrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_dtr', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('emp_id',20);
            $table->time('amin')->nullable();
            $table->time('amout')->nullable();
            $table->time('pmin')->nullable();
            $table->time('pmout')->nullable();
            $table->date('dtrdate');
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
        Schema::dropIfExists('employee_dtr');
    }
}
