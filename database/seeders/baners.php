<?php

namespace Database\Seeders;

use App\Models\banners;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;

class baners extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {  // Mengisi 10 data contoh
            banners::create([
                'image' => 'storage/user-avatar/' . $faker->image('public/storage/users-avatar', 640, 480, null, false), // Generate fake image name
            ]);
        }
    }
}
