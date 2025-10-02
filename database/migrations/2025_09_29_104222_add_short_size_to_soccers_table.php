<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddShortSizeToSoccersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('soccers', function (Blueprint $table) {
        $table->enum('short_size', ['xs', 's', 'm', 'l','xl','2xl', '3xl'])->default('s')->after('shirt_size');

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
        $table->enum('short_size', ['xs', 's', 'm', 'l','xl','2xl', '3xl'])->default('s')->after('shirt_size');

        });
    }
}