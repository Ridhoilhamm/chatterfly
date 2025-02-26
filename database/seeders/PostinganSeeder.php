<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\postingan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PhpParser\Node\Expr\PostDec;

class PostinganSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::pluck('id'); 

        if ($users->isEmpty()) {
            $this->command->warn('Tidak ada user ditemukan. Jalankan "php artisan db:seed --class=UserSeeder" terlebih dahulu.');
            return;
        }

        foreach ($users as $user_id) {
            postingan::create([
                'user_id' => $user_id,
                'content' => fake()->sentence(),
                'media_path' => $this->generateFakeMedia(),
                'media_type' => rand(0, 1) ? 'image' : 'video'
            ]);
        }
    }

    private function generateFakeMedia(): ?string
    {
        $images = ['uploads/sample1.jpg', 'uploads/sample2.jpg'];
        $videos = ['uploads/sample1.mp4', 'uploads/sample2.mp4'];

        return rand(0, 1) ? $images[array_rand($images)] : $videos[array_rand($videos)];
    }
}
