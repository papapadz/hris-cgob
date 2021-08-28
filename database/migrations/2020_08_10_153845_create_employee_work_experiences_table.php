<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeWorkExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_work_experiences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('emp_id',20);
            $table->bigInteger('position_id');
            $table->string('company',100);
            $table->date('startdate');
            $table->date('enddate')->nullable();
            $table->decimal('salary',10,2);
            $table->integer('sg')->nullable();
            $table->integer('step')->nullable();
            $table->bigInteger('employmenttype_id');
            $table->boolean('isgovernment')->default(false);
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
        Schema::dropIfExists('employee_work_experiences');
    }
}
