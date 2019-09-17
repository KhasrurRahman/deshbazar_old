<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFootersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footers', function (Blueprint $table) {
            $table->increments('id');
            $table->text('jana_ojana');
            $table->text('ad_rules');
            $table->text('payment_information');
            $table->text('customer_deal');
            $table->text('fast_sell');
            $table->text('terms');
            $table->text('delivery');
            $table->text('membership');
            $table->text('about_us');
            $table->text('business_demand');
            $table->text('secret_terms');
            $table->text('ghoreyboshe_career');
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
        Schema::dropIfExists('footers');
    }
}
