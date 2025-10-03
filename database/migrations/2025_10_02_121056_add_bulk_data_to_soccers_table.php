<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBulkDataToSoccersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('soccers', function (Blueprint $table) {
             $table->json('bulk_data')->nullable()->after('collar_type'); 
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
            $table->dropColumn('bulk_data');
        });
    }
}