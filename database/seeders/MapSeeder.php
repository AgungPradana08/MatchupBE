<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('map')->insert([
            [
                'title_lokasi' => 'Markas Sport Center',
                'detail_lokasi' => 'Jl markas pokonya lah cek sendiri males gua ngasih detail',
                'harga_sewa_lokasi' => '900000',
                'embed_google_map' => 'halo',
            ]
        ]);
    }
}
