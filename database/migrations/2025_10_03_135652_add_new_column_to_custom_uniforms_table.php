<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnToCustomUniformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('custom_uniforms', function (Blueprint $table) {
             $table->string('logo')->nullable(); // 👈 apna column name yaha dalna
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
            $table->dropColumn('logo');
        });
    }
}