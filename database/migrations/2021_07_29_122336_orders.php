<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->string('trx_id')->nullable();
            $table->string('payment_id')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('mobile');
            $table->longText('address');
            $table->string('city');
            $table->string('zip');
            $table->string('state')->nullable();
            $table->string('company');
            $table->string('coupon_code');
            $table->integer('coupon_value');
            $table->string('order_status');
            $table->enum('payment_type',['COD','Gateway'])->default('COD');
            $table->string('payment_status');
            $table->string('total_amount');
            $table->string('country');
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
        Schema::dropIfExists('orders');
    }
}
