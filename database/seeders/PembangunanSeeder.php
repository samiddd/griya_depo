<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PembangunanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pembangunans')->insert([
            'nama' => 'Taufik Hidayat',
            'wa' => '6285845591668', 
            'alamat' => 'Jl. Bypass Juanda',
            'deskripsi' => 'Rumah 2 Lantai dengan 4 kamar',
            'budget' => '200000000',
            'status' => 'diterima',
            'kontraktor' => 'PT. Rusmalina Indah',
            'file' => 'admin-assets/assets/img/atap-bocor.jpg',
        ]);
    }
}
