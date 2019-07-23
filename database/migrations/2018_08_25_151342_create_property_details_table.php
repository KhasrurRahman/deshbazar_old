<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('information_id');
            $table->string('ad_title');
            $table->string('bed')->nullable();
            $table->string('bath')->nullable();
            $table->integer('home_area')->nullable();
            $table->string('home_area_unit')->nullable();
            $table->integer('land_area')->nullable();
            $table->string('land_area_unit')->nullable();
            $table->string('location_point')->nullable();
            $table->text('description');
            $table->float('property_price',15,2);
            $table->string('property_price_check')->nullable();
            $table->string('location');
            $table->string('publication_status')->default('Unpublished');
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
        Schema::dropIfExists('property_details');
    }
}
