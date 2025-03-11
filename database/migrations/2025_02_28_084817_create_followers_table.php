<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('pengikut', function (Blueprint $table) {
            $table->id();
            $table->foreignId('follower_id')->constrained('users')->onDelete('cascade'); // User yang mengikuti
            $table->foreignId('followed_id')->constrained('users')->onDelete('cascade'); // User yang diikuti
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('followers');
    }
};

