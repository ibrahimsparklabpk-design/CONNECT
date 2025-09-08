<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTwoFactorColumnsToRegisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('register_table', function (Blueprint $table) {
            $table->string('two_factor_method')->nullable(); // Add two_factor_method column
            $table->string('two_factor_code')->nullable();   // Add two_factor_code column
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
            $table->dropColumn('two_factor_method');
            $table->dropColumn('two_factor_code');
        });
    }
}
