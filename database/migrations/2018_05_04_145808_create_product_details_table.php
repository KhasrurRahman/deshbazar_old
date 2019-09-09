<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('information_id');
            $table->string('ad_title');
            $table->string('product_condition');
            $table->string('product_brand')->nullable();
            $table->string('product_model')->nullable();
            $table->string('product_model_year_cc')->nullable();
            $table->string('nibondhon_year')->nullable();
            $table->string('fuel')->nullable();
            $table->string('km_ride')->nullable();
            $table->string('servising')->nullable();
            $table->string('village_ord')->nullable();

            $table->text('product_description');
            $table->string('product_reality');
            $table->float('product_price',15,2);
            $table->string('product_price_check')->nullable();
            $table->string('location');
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
        Schema::dropIfExists('product_details');
    }
}
