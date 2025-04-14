<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laporan_videos', function (Blueprint $table) {
          
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('post_id')->constrained('post_videos')->onDelete('cascade');
            $table->text('reason')->nullable(); // alasan laporan
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // status oleh admin
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_videos');
    }
};
