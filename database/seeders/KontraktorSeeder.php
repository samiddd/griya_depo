<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KontraktorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kontraktors')->insert([
            'nama' => 'PT. Jaya Bangunan',
            'username' => 'jaya-bangunan',
            'wa' => '6285845591668', 
            'alamat' => 'Jl. Bypass Juanda',
            'penanggung_jawab' => 'Dimas Sul Ulum',
            'foto' => 'admin-assets/assets/img/arashmil.jpg',
        ]);

        DB::table('kontraktors')->insert([
            'nama' => 'PT. Global Perkasa',
            'username' => 'global-perkasa',
            'wa' => '6285845591668', 
            'alamat' => 'Jl. Bypass Juanda',
            'penanggung_jawab' => 'Zudha Pratama',
            'foto' => 'admin-assets/assets/img/chadengle.jpg',
        ]);

        DB::table('kontraktors')->insert([
            'nama' => 'PT. Adil Makmur',
            'username' => 'adil-makmur',
            'wa' => '6285845591668', 
            'alamat' => 'Jl. Bypass Juanda',
            'penanggung_jawab' => 'Triandi Putra',
            'foto' => 'admin-assets/assets/img/jm_denis.jpg',
        ]);

        DB::table('kontraktors')->insert([
            'nama' => 'PT. Jaya Selamanya',
            'username' => 'jaya-selamanya',
            'wa' => '6285845591668', 
            'alamat' => 'Jl. Bypass Juanda',
            'penanggung_jawab' => 'Tanwirul Qulub',
            'foto' => 'admin-assets/assets/img/profile.jpg',
        ]);

        DB::table('kontraktors')->insert([
            'nama' => 'PT. Rusmalina Indah',
            'username' => 'rusmalina-indah',
            'wa' => '6285845591668', 
            'alamat' => 'Jl. Bypass Juanda',
            'penanggung_jawab' => 'Ruslan Ahmadi',
            'foto' => 'admin-assets/assets/img/profile2.jpg',
        ]);
    }
}
