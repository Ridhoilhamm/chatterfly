<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostVidioSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Array video sample dengan berbagai durasi dan resolusi
        $videoSamples = [
            'https://samplelib.com/lib/preview/mp4/sample-5s.mp4',
            'https://samplelib.com/lib/preview/mp4/sample-10s.mp4',
            'https://samplelib.com/lib/preview/mp4/sample-20s.mp4',
            'https://samplelib.com/lib/preview/mp4/sample-30s.mp4',
        ];

        foreach (range(1, 10) as $index) {
            // Pilih video secara acak
            $videoUrl = $videoSamples[array_rand($videoSamples)];

            // Buat nama file random
            $fileName = 'videos/' . $faker->uuid . '.mp4';

            // Simpan file ke storage
            Storage::disk('public')->put($fileName, file_get_contents($videoUrl));

            // Ambil user_id yang valid (hanya dari id 1-10)
            $user = User::whereBetween('id', [1, 10])->inRandomOrder()->first();
            
            if ($user) {
                DB::table('post_videos')->insert([
                    'user_id' => $user->id,
                    'video_path' => $fileName,
                    'caption' => $faker->sentence,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
