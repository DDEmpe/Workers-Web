<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class JobVacancies extends Migration
{
    /**{{  }}
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_vacancies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('branch');
            $table->string('location');
            $table->string('uid_job_vacancy')->unique();
            $table->unsignedBigInteger('departement_id');
            $table->string('job_type');
            $table->unsignedBigInteger('min_wages');
            $table->unsignedBigInteger('max_wages');
            $table->string('last_education');
            $table->text('description');
            $table->unsignedBigInteger('study_major_id');
            $table->date('deadline');
            $table->boolean('interview');
            $table->timestamps();


            $table->foreign('departement_id')->references('id')->on('departments')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('company_details')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('study_major_id')->references('id')->on('study_majors')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_vacancies');
    }
}
