<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStripeFieldsToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
         // Stripe IDs
        $table->string('stripe_session_id')->nullable()->after('id');
        $table->string('stripe_payment_method_id')->nullable()->after('stripe_payment_intent_id');
        $table->string('stripe_customer_id')->nullable()->after('stripe_payment_method_id');

        // Payment info
        $table->integer('amount')->nullable()->after('stripe_customer_id'); // in cents
        $table->string('currency', 10)->default('usd')->after('amount');
        $table->string('receipt_url')->nullable()->after('payment_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
   public function down()
{
    Schema::table('orders', function (Blueprint $table) {
        $table->dropColumn([
            'stripe_session_id',
            'stripe_payment_method_id',
            'stripe_customer_id',
            'amount',
            'currency',
            'payment_status',
            'receipt_url',
        ]);
    });
}
}