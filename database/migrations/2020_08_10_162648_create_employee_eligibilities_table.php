<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeEligibilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_eligibilities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('emp_id',20);
            $table->bigInteger('eligibilitytype_id');
            $table->decimal('rating')->nullable();
            $table->string('licensenum',20)->nullable();
            $table->date('startdate');
            $table->date('enddate')->nullable();
            $table->string('place',100);
            $table->string('file_url',100)->nullable();
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
        Schema::dropIfExists('employee_eligibilities');
    }
}
