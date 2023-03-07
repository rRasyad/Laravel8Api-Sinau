<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalSelectedSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soal_selected_sessions', function (Blueprint $table) {
            $table->foreignId('soal_id')->constrained('soals','id');
            $table->foreignId('session_id')->constrained('soal_sessions','id');
            $table->boolean('benar')->default(false);
            // $table->integer('benar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('soal_selected_sessions');
    }
}
