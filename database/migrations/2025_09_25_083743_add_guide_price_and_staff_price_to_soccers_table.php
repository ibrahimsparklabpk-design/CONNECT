<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGuidePriceAndStaffPriceToSoccersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('soccers', function (Blueprint $table) {
        $table->decimal('guide_price', 10, 2)->default(0)->after('price');
        $table->decimal('staff_price', 10, 2)->default(0)->after('guide_price');
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
           $table->dropColumn(['guide_price', 'staff_price']);
        });
    }
}