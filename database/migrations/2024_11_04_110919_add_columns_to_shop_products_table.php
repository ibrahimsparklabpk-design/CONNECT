<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToShopProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shop_products', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_id')->after('id'); // Assuming customer_id is a foreign key
            $table->string('product_title')->after('total_price');
            $table->string('product_color')->after('product_title'); // Corrected spelling to 'product_color'
            $table->string('product_size')->after('product_color');
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
            $table->dropColumn(['customer_id', 'product_title', 'product_color', 'product_size']);
        });
    }
}