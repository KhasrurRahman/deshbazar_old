<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('product_userchats')->onDelete('cascade');
            $table->integer('from')->unsigned();
            $table->foreign('from')->references('id')->on('front_users')->onDelete('cascade');
            $table->integer('to')->unsigned();
            $table->foreign('to')->references('id')->on('front_users')->onDelete('cascade');
            $table->text('chat');
            $table->integer('status');
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
        Schema::dropIfExists('chats');
    }
}
