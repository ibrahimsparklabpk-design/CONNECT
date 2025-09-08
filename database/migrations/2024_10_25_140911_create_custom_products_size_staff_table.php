<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomProductsSizeStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_products_size_staff', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('customer_id')->nullable(); 
            $table->string('staff_name')->nullable(); 
            $table->string('staff_sleeves_length')->nullable(); 
            $table->string('staff_pants_length')->nullable(); 
            $table->string('staff_shirt_size')->nullable(); 
            $table->string('staff_pants_size')->nullable(); 
            $table->integer('staff_quantity')->nullable(); 
            
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
        Schema::dropIfExists('custom_products_size_staff');
    }
}