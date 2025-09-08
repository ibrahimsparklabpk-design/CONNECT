<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectoryTableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directory_table', function (Blueprint $table) {
            $table->id();
            $table->string('professional_or_business_name');
            $table->string('email');
            $table->string('cell_number');
            $table->string('work_number')->nullable();
            $table->string('industry');
            $table->string('website')->nullable();
            $table->string('education')->nullable();
            $table->string('experience')->nullable();
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->text('goods_or_services_provided')->nullable();
            $table->string('profile_picture')->nullable();
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
        Schema::dropIfExists('directory_table');
    }
}