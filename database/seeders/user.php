<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class user extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
            $users = User::all();
    
            foreach ($users as $user) {
                $user->update([
                    'followers' => rand(0, 1000),  // Nilai acak untuk followers
                    'following' => rand(0, 1000),  // Nilai acak untuk following
                ]);
            }
    
        }
    }

