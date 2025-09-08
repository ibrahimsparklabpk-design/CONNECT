<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomProductsSizeGuidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_products_size_guides', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id'); // Reference to customer table
            $table->string('size_guide_name');
            $table->string('size_guide_number');
            $table->string('size_guide_short_size');
            $table->string('size_guide_shirt_size');
            $table->integer('size_guide_quantity');
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
        Schema::dropIfExists('custom_products_size_guides');
    }
}
