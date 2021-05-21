<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveCardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_cards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('leave_id');
            $table->decimal('value',3,3);
            $table->decimal('vl',6,3);
            $table->decimal('sl',6,3);
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
        Schema::dropIfExists('leave_card');
    }
}
