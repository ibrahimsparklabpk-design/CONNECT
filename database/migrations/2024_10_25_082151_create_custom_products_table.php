<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_products', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id');
            $table->string('sleeve_length')->nullable();
            $table->string('team_logo')->nullable();
            $table->string('collar_type')->nullable();
            $table->string('kit')->nullable();
            $table->string('fit_type')->nullable();
            $table->string('inside_collar_message')->nullable();
            $table->string('socks')->nullable();
            $table->string('collar_text')->nullable();
            $table->string('socks_color')->nullable();
            $table->string('goalkeeper_kit')->nullable();
            $table->string('padded')->nullable();
            $table->string('goalkeeper_sleeve')->nullable();
            $table->string('goalkeeper_jersey_design')->nullable();
            $table->string('jersey_color')->nullable();
            $table->string('staff_other')->nullable();
            $table->string('staff_kit')->nullable();
            $table->string('staff_collar_type')->nullable();
            $table->string('staff_fit_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('custom_products');
    }
}
