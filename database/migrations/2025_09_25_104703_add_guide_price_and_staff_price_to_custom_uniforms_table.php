<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGuidePriceAndStaffPriceToCustomUniformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('custom_uniforms', function (Blueprint $table) {
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
        Schema::table('custom_uniforms', function (Blueprint $table) {
             $table->dropColumn('staff_price');
        });
    }
}