<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductUserchatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_userchats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user1_id')->unsigned();
            $table->foreign('user1_id')->references('id')->on('front_users')->onDelete('cascade');
            $table->integer('user2_id')->unsigned();
            $table->foreign('user2_id')->references('id')->on('front_users')->onDelete('cascade');

            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('product_informations')->onDelete('cascade');
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
        Schema::dropIfExists('product_userchats');
    }
}
