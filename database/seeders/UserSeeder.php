<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        // Membuat 10 pengguna dummy
        foreach (range(1, 10) as $index) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password123'), // Menggunakan password yang di-hash
                'role' => $faker->randomElement(['admin', 'super_admin', 'user']),
                'phone' => $faker->phoneNumber,
                'avatar' => $faker->imageUrl(200, 200, 'people'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
