<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameWorkNumberToBuildingNumberInDirectoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('directory_table', function (Blueprint $table) {
            // Rename the column
        $table->renameColumn('work_number', 'building_number');
        
        // Move the column after 'city' (this requires dropping and re-adding)
        $table->string('building_number')->after('city')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('directory_table', function (Blueprint $table) {
            $table->renameColumn('building_number', 'work_number');
        });
    }
}