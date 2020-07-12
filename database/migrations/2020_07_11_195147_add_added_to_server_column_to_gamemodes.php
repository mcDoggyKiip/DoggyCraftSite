<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAddedToServerColumnToGamemodes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gamemodes', function (Blueprint $table) {
            $table->dateTime('added_to_server');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gamemodes', function (Blueprint $table) {
            $table->dropColumn('added_to_server');
        });
    }
}
