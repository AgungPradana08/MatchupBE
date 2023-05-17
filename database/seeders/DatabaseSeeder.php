<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('sparring')->insert([
            'title' => 'Bayern Munchen',
            'olahraga' => 'Sepak Bola',
            'deskripsi' => 'Ayo Join',
            'lokasi' => 'Markas sport center',
            'min_member' => '11',
            'max_member' => '20',
            'aksebilitas' => 'Terbuka',
            'tingkatan' => '17-20',
            'tanggal_pertandingan' => '23 Mei 2023',
            'harga_tiket' => '70000',
            'lama_pertandingan' => '90 Menit',
            'deskripsi_tambahan' => 'ga adaa deskripsi',
        ]);
    }
}
