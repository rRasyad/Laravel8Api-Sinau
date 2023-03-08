<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soal_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained('users', 'id')->unique();
            $table->foreignId("unit_id")->constrained('units', 'id');
            $table->foreignId("bab_id")->constrained('unit_babs', 'id');
            $table->foreignId("part");
            $table->integer("session_max");
            $table->integer("session_current");
            $table->dateTime("session_expire");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('soal_sessions');
    }
}
