<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_trainings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('emp_id',20);
            $table->string('trainingtitle',100);
            $table->string('sponsor',100);
            $table->string('venue',100);
            $table->bigInteger('trainingtype_id');
            $table->decimal('hrs',7,2);
            $table->date('startdate');
            $table->date('enddate');
            $table->bigInteger('address_id');
            $table->string('file_url',100)->nullable();
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
        Schema::dropIfExists('employee_trainings');
    }
}
