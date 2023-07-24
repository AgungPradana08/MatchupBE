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
            'nama_tim' => 'Bayern Munchen',
            'image' => 'ppblank.png',
            'olahraga' => 'Futsal',
            'deskripsi' => 'Gelut dek?',
            'max_member' => '20',
            'tingkatan' => '21+tahun',
            'nomor_telepon' => '08768203472',
            'instagram' => 'daffagaming',
            'whatsapp' => '0857094160',
            'facebook' => 'daffaganteng',
        ]);
    }
}
