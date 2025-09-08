<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if (!Schema::hasTable('comments')) {
            Schema::create('comments', function (Blueprint $table) {
                $table->id();
                $table->string('reviewer_name');
                $table->string('review_title');
                $table->text('review_description');
                $table->date('date_of_experience');
                $table->integer('review_stars');
                $table->unsignedBigInteger('directory_id'); // Foreign key for directory
                $table->timestamps();
                $table->foreign('directory_id')->references('id')->on('directories')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
