<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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

        // Contact Information
        $table->string('email');
        $table->boolean('news_offers')->default(false);

        // Shipping Information
        $table->string('country');
        $table->string('first_name');
        $table->string('last_name');
        $table->string('company')->nullable();
        $table->string('address');
        $table->string('apartment')->nullable();
        $table->string('city');
        $table->string('state');
        $table->string('zip_code');
        $table->string('phone');

        // Payment Info
        $table->string('account_holder_name');
        $table->string('payment_status')->default('pending');
        $table->string('stripe_payment_intent_id')->nullable(); // if using Stripe

        // Billing Info
        $table->boolean('billing_same')->default(true);
        $table->string('billing_first_name')->nullable();
        $table->string('billing_last_name')->nullable();
        $table->string('billing_company')->nullable();
        $table->string('billing_address')->nullable();
        $table->string('billing_apartment')->nullable();
        $table->string('billing_city')->nullable();
        $table->string('billing_state')->nullable();
        $table->string('billing_zip')->nullable();
        $table->string('billing_phone')->nullable();

        // Additional
        $table->boolean('save_info')->default(false);

        $table->timestamps();
    });
}

}