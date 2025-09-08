<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaymentToCustomePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('custome_payments', function (Blueprint $table) {
            $table->decimal('payment', 10, 2)->after('billing_phone')->nullable();
            // `payment` column decimal format mein hai, jisme 10 digits aur 2 decimal points hain
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('custome_payments', function (Blueprint $table) {
            $table->dropColumn('payment');
        });
    }
}
