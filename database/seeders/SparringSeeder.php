<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SparringSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usersparring')->insert([
            'user_id' => '1',
            'usertim_id' => '1',
            'title' => 'FIFA 2026',
            'nama_tim' => 'Inter Milan',
            'image' => 'ppblank.png',
            'olahraga' => 'Futsal',
            'deskripsi' => 'halo kids',
            'lokasi' => 'Markas Sport Center',
            'detail_lokasi' => 'Markas Sport Center',
            'embed_lokasi' => 'Markas Sport Center',
            'min_member' => '1',
            'max_member' => '2',
            'tingkatan' => '21+ Tahun',
            'tanggal_pertandingan' => '12 Mei 2023',
            'harga_tiket' => '95000',
            'lama_pertandingan' => '30 menit',
            'waktu_pertandingan' => '12.00',
            'deskripsi_tambahan' => 'ga adaa deskripsi',
        ]);
    }
}
