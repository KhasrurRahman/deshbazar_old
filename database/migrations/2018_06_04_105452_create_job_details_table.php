<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('information_id');
            $table->string('ad_title');
            $table->text('description');
            $table->string('job_type');
            $table->string('industry');
            $table->string('job_function');
            $table->string('designation')->nullable();
            $table->string('recieve_option');
            $table->string('starting_range')->nullable();
            $table->string('ending_range')->nullable();
            $table->string('total_vacancies')->nullable();
            $table->string('expire_date')->nullable();
            $table->string('company_name');
            $table->text('company_logo')->nullable();
            $table->string('minimum_requirement')->nullable();
            $table->tinyInteger('experience')->nullable();
            $table->string('education_sector')->nullable();
            $table->string('skill')->nullable();
            $table->smallInteger('age_limit')->nullable();
            $table->string('gender')->nullable();
            $table->string('publication_status');
            $table->tinyInteger('top_ad')->default(0);
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
        Schema::dropIfExists('job_details');
    }
}
