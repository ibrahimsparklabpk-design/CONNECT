<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPriceToCustomUniformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('custom_uniforms', function (Blueprint $table) {
          $table->decimal('price', 10, 2)->nullable()->after('quantity'); // adjust 'after' column as needed

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
            $table->dropColumn('price');

        });
    }
}