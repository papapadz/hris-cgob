<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->string('emp_id',20)->primary();
            $table->string('lastname',50);
            $table->string('firstname',50);
            $table->string('middlename',50)->nullable();
            $table->string('extension',10)->nullable();
            $table->date('birthdate');
            $table->string('birthplace',100);
            $table->string('address_id',10);
            $table->bigInteger('civilstat_id');
            $table->bigInteger('citizenship_id');
            $table->string('gender',1);
            $table->decimal('height');
            $table->decimal('weight');
            $table->string('bloodtype',3);
            $table->string('image_url',255)->nullable();
            $table->boolean('isapplicant')->default(false);
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
        Schema::dropIfExists('employees');
    }
}
