<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MitraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mitras')->insert([
            'nama' => 'PT. Jaya Bangunan',
            'username' => 'jaya-bangunan',
            'wa' => '6285845591668', 
            'alamat' => 'Jl. Bypass Juanda',
            'penanggung_jawab' => 'Dimas Sul Ulum',
            'kategori' => 'Tukang Ledeng',
            'foto' => 'admin-assets/assets/img/arashmil.jpg',
        ]);

        DB::table('mitras')->insert([
            'nama' => 'PT. Global Perkasa',
            'username' => 'global-perkasa',
            'wa' => '6285845591668', 
            'alamat' => 'Jl. Bypass Juanda',
            'penanggung_jawab' => 'Zudha Pratama',
            'kategori' => 'Tukang Listrik',
            'foto' => 'admin-assets/assets/img/chadengle.jpg',
        ]);

        DB::table('mitras')->insert([
            'nama' => 'PT. Adil Makmur',
            'username' => 'adil-makmur',
            'wa' => '6285845591668', 
            'alamat' => 'Jl. Bypass Juanda',
            'penanggung_jawab' => 'Triandi Putra',
            'kategori' => 'Reparasi AC',
            'foto' => 'admin-assets/assets/img/jm_denis.jpg',
        ]);

        DB::table('mitras')->insert([
            'nama' => 'PT. Jaya Selamanya',
            'username' => 'jaya-selamanya',
            'wa' => '6285845591668', 
            'alamat' => 'Jl. Bypass Juanda',
            'penanggung_jawab' => 'Tanwirul Qulub',
            'kategori' => 'Perbaikan Atap',
            'foto' => 'admin-assets/assets/img/profile.jpg',
        ]);

        DB::table('mitras')->insert([
            'nama' => 'PT. Rusmalina Indah',
            'username' => 'rusmalina-indah',
            'wa' => '6285845591668', 
            'alamat' => 'Jl. Bypass Juanda',
            'penanggung_jawab' => 'Ruslan Ahmadi',
            'kategori' => 'Lanscaping',
            'foto' => 'admin-assets/assets/img/profile2.jpg',
        ]);
    }
}
