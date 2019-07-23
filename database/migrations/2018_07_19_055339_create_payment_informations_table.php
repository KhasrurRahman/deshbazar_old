<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('wmx_id');
            $table->string('ref_id');
            $table->string('token');
            $table->float('merchant_req_amount',15,2);
            $table->string('merchant_ref_id');
            $table->string('merchant_currency');
            $table->float('merchant_amount_bdt',15,2);
            $table->float('conversion_rate',15,2);
            $table->float('service_ratio',15,2);
            $table->float('wmx_charge_bdt',15,2);
            $table->float('emi_ratio',15,2);
            $table->float('emi_charge',15,2);
            $table->float('bank_amount_bdt',15,2);
            $table->float('discount_bdt',15,2);
            $table->integer('merchant_order_id');
            $table->string('request_ip');
            $table->string('txn_details')->nullable();
            $table->string('card_details')->nullable();
            $table->tinyInteger('is_foreign');
            $table->string('payment_card');
            $table->string('card_code');
            $table->integer('payment_method');
            $table->timestamp('init_time')->nullabel();
            $table->timestamp('txn_time')->nullable();
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
        Schema::dropIfExists('payment_informations');
    }
}
