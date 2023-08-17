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
                'embed_google_map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.7164918587832!2d110.85877227331912!3d-6.804302266546279!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70c525fd6001b1%3A0xe28fff5d78f8ce5f!2sMarkass%20Sport%20Center!5e0!3m2!1sid!2sid!4v1692256732496!5m2!1sid!2sid',
                
            ]
        ]);
    }
}
