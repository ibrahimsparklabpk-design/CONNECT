<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToCustomUniformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('custom_uniforms', function (Blueprint $table) {
           $table->string('image')->nullable()->after('guide_quantity');
            $table->string('logo')->nullable()->after('image');
            $table->string('pattern')->nullable()->after('logo');

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
          $table->dropColumn(['image', 'logo', 'pattern']);
        });
    }
}