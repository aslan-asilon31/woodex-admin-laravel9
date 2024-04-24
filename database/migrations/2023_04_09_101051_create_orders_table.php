<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_code', 10);
            $table->tinyInteger('status')->default(0);
            $table->string('order_status', 20)->default('Menunggu Konfirmasi');
            $table->string('payment_status', 20)->default('Menunggu Pembayaran');
            $table->date('order_date');
            $table->integer('dp_price');
            $table->integer('total_price');
            $table->integer('remaining_payment');
            $table->string('payment_option', 6)->default('DP 50%');
            $table->string('full_payment', 20)->nullable();
            $table->string('evidencetf')->nullable();
            $table->string('evidencetf2')->nullable();
            $table->string('shipping_method')->nullable();
            $table->string('shipping_service')->nullable();
            $table->string('resi_number')->nullable();
            $table->string('postage')->nullable();
            $table->foreignId('user_id');
            $table->foreignId('shipment_id')->nullable();
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
};
