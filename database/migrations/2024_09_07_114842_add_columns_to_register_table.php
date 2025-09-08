<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToRegisterTable extends Migration
{
    /**
     * This migration is update the table register_table
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('register_table', function (Blueprint $table) {
            $table->string('first_name')->nullable();  // Add first_name column
            $table->string('last_name')->nullable();   // Add last_name column
            $table->string('display_name')->nullable(); // Add display_name column
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('register_table', function (Blueprint $table) {
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('display_name');
        });
    }
}