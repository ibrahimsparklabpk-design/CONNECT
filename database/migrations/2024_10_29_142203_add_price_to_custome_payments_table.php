<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPriceToCustomePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('custome_payments', function (Blueprint $table) {
            $table->decimal('price', 8, 2)->nullable()->after('billing_phone');
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
            $table->dropColumn('price');
        });
    }
}
