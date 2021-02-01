<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeIpcrfRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_ipcrf_ratings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('ipcrf_id');
            $table->integer('selfrating')->default(1);
            $table->integer('supervisorrating')->default(1);
            $table->string('itemtype',5);
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
        Schema::dropIfExists('employee_ipcrf_ratings');
    }
}
