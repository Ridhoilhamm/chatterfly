<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Ambil semua user yang sudah ada
        $users = DB::table('users')->get();

        foreach ($users as $user) {
            DB::table('users')
                ->where('id', $user->id)
                ->update([
                    'jenis_kelamin' => $faker->randomElement(['laki-laki', 'perempuan']),
                    'alamat' => $faker->address,
                    'bio' => $faker->sentence(10),
                    'updated_at' => now(),
                ]);
        }
    }
}

