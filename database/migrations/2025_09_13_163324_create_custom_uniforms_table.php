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
            $table->string('name', 255);
            $table->integer('number');
            $table->enum('shirt_size', ['xs', 's', 'm', 'l','xl','2xl', '3xl'])->default('s');
            $table->enum('sleeves_length', ['short', 'long'])->default('long');
            $table->integer('quantity');

            // Goal Keeper Requirements
           $table->enum('goalkeeper_kit', ['yes', 'no'])->default('no');
           $table->enum('goalkeeper_jersey_design', ['same_as_player_uniform','custom_design'])->default('custom_design');           
           $table->enum('goalkeeper_sleeves', ['long','short', 'padded_elbows'])->default('long');  
           $table->enum('jersey_color', ['same_as_top','same_as_pants', 'red', 'blue', 'black', 'white', 'other'])->default('black');  
           
           
           // Staff/Management Requirements
           $table->enum('staff_other', ['yes', 'no'])->default('no');
           $table->enum('staff_fit_type', ['men', 'women'])->default('men');
           $table->enum('staff_kit_type', ['full', 'shirt'])->default('full'); 
           $table->enum('staff_collar_type', ['v-neck', 'round-neck', 'polo-style'])->default('polo-style');            
           $table->enum('staff_sleeves_length', ['short', 'long', 'both'])->default('long');

           //  Staff Size Guide

            $table->string('guide_name', 255);
            $table->integer('guide_number');
            $table->enum('guide_shirt_size', ['xs', 's', 'm', 'l','xl','2xl', '3xl'])->default('s');
            $table->enum('guide_pant_size', ['xs', 's', 'm', 'l','xl','2xl', '3xl'])->default('s');
            $table->enum('guide_sleeves_length', ['short', 'long'])->default('long');
            $table->integer('guide_quantity');
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