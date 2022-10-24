<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerbaikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('perbaikans')->insert([
            'nama' => 'Taufik Hidayat',
            'wa' => '6285845591668', 
            'alamat' => 'Jl. Bypass Juanda',
            'keluhan' => 'Atap saya bocor besar sekali',
            'kategori' => 'Perbaikan Atap',
            'foto' => 'admin-assets/assets/img/atap-bocor.jpg',
            'status' => 'diterima',
        ]);
    }
}
