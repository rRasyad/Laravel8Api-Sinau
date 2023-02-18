<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->enum('role', ['user', 'admin'])->default('user');
            $table->string('avatar')->nullable();
            $table->string('nama')->nullable();
            $table->string('namaUser')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('password');
            // $table->timestamp("joined_at");
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
