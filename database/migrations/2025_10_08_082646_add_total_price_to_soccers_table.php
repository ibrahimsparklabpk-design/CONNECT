<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTotalPriceToSoccersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('soccers', function (Blueprint $table) {
            $table->decimal('grand_total', 10, 2)->default(0)->after('guide_bulk_data');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('soccers', function (Blueprint $table) {
            $table->dropColumn('grand_total');
        });
    }
}