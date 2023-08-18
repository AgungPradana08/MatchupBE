<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usertim')->insert([

            [
                'user_id' => '1',
                'host_id' => '1',
                'nama_tim' => 'Inter Milan',
                'image' => 'image2/inter milan.png',
                'skor' => '100',
                'olahraga' => 'Separk Bola',
                'deskripsi' => 'Tim kita pengen menguasai liga eropa',
                'max_member' => '12',
                'area_bermain' => 'Semarang',
                'tingkatan' => '21+tahun',
                'nomor_telepon' => '08768203472',
                'instagram' => '@erictohir',
                'whatsapp' => '0857094160',
                'facebook' => 'Eric Tohir',
            ],

        ]);
    }
}
