<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateShopProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shop_products', function (Blueprint $table) {
            // Columns ko nullable banana
            $table->unsignedBigInteger('customer_id')->nullable()->change();
            $table->string('product_title')->nullable()->change();
            $table->string('product_color')->nullable()->change();
            $table->string('product_size')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shop_products', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_id')->nullable(false)->change();
            $table->string('product_title')->nullable(false)->change();
            $table->string('product_color')->nullable(false)->change();
            $table->string('product_size')->nullable(false)->change();
        });
    }
}