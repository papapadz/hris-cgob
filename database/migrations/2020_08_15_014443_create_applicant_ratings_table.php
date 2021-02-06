<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_ratings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('application_id');
            $table->bigInteger('ratingtype_id');
            $table->decimal('score',8,2)->default(0);
            $table->string('rating_by',20);
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
        Schema::dropIfExists('applicant_ratings');
    }
}
