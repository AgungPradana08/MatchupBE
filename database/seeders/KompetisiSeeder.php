<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KompetisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kompetisi')->insert([
            'title' => 'Liga Malam Jumat',
            'image' => 'download.jpg',
            'olahraga' => 'Sepak Bola',
            'deskripsi' => 'Liga Malam Jumat Bersama Coach Justin',
            'juara_pertama' => '20 Juta',
            'juara_kedua' => '15 Juta',
            'juara_ketiga' => '10 Juta',
            'lokasi' => 'Markas Sport Center',
            'max_member' => '50',
            'tingkatan' => '21+ Tahun',
            'tanggal_pertandingan' => '2023-08-21',
            'harga_tiket' => '50000',
            'lama_pertandingan' => '90 Menit',
            'Waktu_pertandingan' => '18.00',
            'deskripsi_tambahan' => 'Untuk Info Lebih Lanjutnya Follow Ig:JustinusLhaksamana',
        ]);
    }
}
