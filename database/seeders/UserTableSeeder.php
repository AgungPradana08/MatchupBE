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
            'username' => 'riko',
            'image' => 'ppblank.png',
            'name' => 'Radityaz',
            'email' => 'rikoadityazaki@gmail.com',
            'email_verified_at' => '2023-08-12 00:32:11',
            'password' => Hash::make('12345678'),
            ],

            [
                'username' => 'reyhan',
                'image' => 'ppblank.png',
                'name' => 'Reyhan Furry',
                'email' => 'reyhangamingtop@gmail.com',
                'email_verified_at' => '2023-08-12 00:32:11',
                'password' => Hash::make('12345678'),
                ],
                
                [
                    'username' => 'rdyz',
                    'image' => 'ppblank.png',
                    'name' => 'RDYZ_',
                    'email' => 'radityazgames@gmail.com',
                    'email_verified_at' => '2023-08-12 00:32:11',
                    'password' => Hash::make('12345678'),
                ],
        ]);
    }
}
