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


            $table->integer('candidate_age')->nullable();
            $table->string('job_location')->nullable();
            $table->string('company_facility')->nullable();
            $table->string('company_transport_facility')->nullable();
            $table->string('company_food_facility')->nullable();
            $table->string('company_mobile_bill')->nullable();
            $table->string('company_fastival_bonus')->nullable();
            $table->string('company_fee_plan')->nullable();
            $table->string('company_bill_incrase')->nullable();
            $table->string('company_full_time')->nullable();
            $table->string('company_place_type')->nullable();
            $table->string('any_training_expairance')->nullable();
            $table->string('any_workshop_experience')->nullable();
            $table->string('any_computer_training_experience')->nullable();
            $table->integer('voter_id_number')->nullable();
            $table->integer('company_work_description')->nullable();


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
