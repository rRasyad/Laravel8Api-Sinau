<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStreaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('streaks', function (Blueprint $table) {
            $table->id();
            $table->timestamp('tanggalStreak')->useCurrent();
            $table->foreignId('user_id');
            $table->boolean('coldStreak')->default(false);
            $table->integer('streakBesok')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('streaks');
    }
}
