<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kontraktor;
use App\Models\MitraMarketing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        { $this->call([
           
            RoleSeeder::class,
            userseeder::class,
            MitraSeeder::class,
            KontraktorSeeder::class,
            PembangunanSeeder::class,
            PerbaikanSeeder::class,
        ]);
        }
    }
}
