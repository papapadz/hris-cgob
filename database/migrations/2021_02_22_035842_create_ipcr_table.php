<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIpcrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_ipcr', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id',20);
            $table->bigInteger('type_id');
            $table->string('target',255);
            $table->string('accomplishment',255)->nullable();
            $table->bigInteger('mfo_id');
            $table->bigInteger('period_id');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('ipcr_function_types', function (Blueprint $table) {
            $table->id();
            $table->string('type',100);
            $table->string('remarks',100)->nullable();
            $table->timestamps();
        });

        Schema::create('ipcr_types', function (Blueprint $table) {
            $table->id();
            $table->string('type',100);
            $table->string('remarks',100)->nullable();
            $table->timestamps();
        });

        Schema::create('ipcr_mfos', function (Blueprint $table) {
            $table->id();
            $table->string('mfo',150);
            $table->bigInteger('functiontype_id');
            $table->bigInteger('department_id');
            $table->timestamps();
        });

        Schema::create('ipcr_ratings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ipcr_id');
            $table->string('rating_by',20);
            $table->integer('quality',2)->nullable();
            $table->integer('effectiveness',2)->nullable();
            $table->integer('timeliness',2)->nullable();
            $table->string('remarks',255)->nullable();
            $table->timestamps();
        });

        Schema::create('ipcr_periods', function (Blueprint $table) {
            $table->id();
            $table->string('year',4);
            $table->string('type',8);
            $table->integer('period');
            $table->timestamps();
        });

        Schema::create('opcr', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ipcr_id');
            $table->decimal('budget',2);
            $table->decimal('accomplishment_rate',2);
            $table->timestamps();
        });

        Schema::create('opcr_accountables', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('opcr_id');
            $table->string('emp_id',20);
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
        Schema::dropIfExists('employee_ipcr');
        Schema::dropIfExists('ipcr_function_types');
        Schema::dropIfExists('ipcr_types');
        Schema::dropIfExists('ipcr_mfos');
        Schema::dropIfExists('ipcr_ratings');
        Schema::dropIfExists('ipcr_periods');
        Schema::dropIfExists('opcr');
        Schema::dropIfExists('opcr_accountables');
    }
}
