<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
            'username' => 'Owi',
            'image' => 'ppblank.png',
            'name' => 'Jokowi Dodo',
            'email' => 'owi@gmail.com',
            'email_verified_at' => '2023-08-12 00:32:11',
            'password' => Hash::make('123456789'),
            ],

            [
                'username' => 'owo',
                'image' => 'ppblank.png',
                'name' => 'Prabowo',
                'email' => 'owo@gmail.com',
                'email_verified_at' => '2023-08-12 00:32:11',
                'password' => Hash::make('123456789'),
                ],
        ]);
    }
}
