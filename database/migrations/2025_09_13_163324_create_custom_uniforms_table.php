<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomUniformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_uniforms', function (Blueprint $table) {
            $table->id();
            $table->enum('fit_type', ['men', 'women', 'youth'])->default('men');
            $table->enum('kit_type', ['full', 'shirt', 'both'])->default('full');
            $table->enum('collar_type', ['v-neck', 'round-neck', 'polo-style'])->default('polo-style');
            $table->enum('team_logo', ['sublimated', 'embroidery'])->default('sublimated');
            $table->enum('outfield_players_socks', ['yes', 'no'])->default('no');
            $table->enum('inside_shirt_collar', ['yes', 'no'])->default('no');

            // size

            $table->string('name')->nullable();
            $table->string('number')->nullable();
            $table->string('shirt_size')->nullable();
            $table->string('short_size')->nullable();
            $table->string('quantity')->nullable();
            // $table->string('price')->nullable();

            $table->enum('sleeves_length', ['short', 'long'])->default('long');

            

            // images section starts
            $table->string('logo')->nullable();
            $table->string('pattern')->nullable();
            $table->string('image')->nullable();

            // columns to send bulk data 
            $table->json('bulk_data')->nullable();

            // price columns
             $table->string('price')->nullable();
             $table->decimal('grand_total', 10, 2)->default(0);

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
        Schema::dropIfExists('custom_uniforms');
    }
}