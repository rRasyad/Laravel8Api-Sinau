<?php

use App\Models\Soal;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoalArtiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soal_arti', function (Blueprint $table) {
            // $table->id();
            $table->foreignIdFor(Soal::class);
            $table->integer('index_soal')->unsigned();
            $table->string('arti', 64);
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('soal_arti');
    }
}
