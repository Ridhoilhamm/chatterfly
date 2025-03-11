<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('follow_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('follower_id')->constrained('users')->onDelete('cascade'); // Pengirim permintaan
            $table->foreignId('followed_id')->constrained('users')->onDelete('cascade'); // Penerima permintaan
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('follow_requests');
    }
};

