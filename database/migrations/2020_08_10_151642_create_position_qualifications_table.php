<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('position_qualifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('position_id');
            $table->integer('education')->default(0);
            $table->integer('training')->default(0);
            $table->integer('workexperience')->default(0);
            $table->integer('eligibility')->default(0);
            $table->bigInteger('eligibility_id')->nullable();
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
        Schema::dropIfExists('position_qualifications');
    }
}
