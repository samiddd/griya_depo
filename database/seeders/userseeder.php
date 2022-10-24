<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $User =  User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('userGriya'),
        ]);
        $User->assignRole('user');

        $admin =  User::create([
            'name' => 'Admin',
            'email' => 'griyadeponusantara@gmail.com',
            'password' => Hash::make('adminGriya'),
        ]);

        $admin->assignRole('admin');

        $mitra = User::create([
            'name' => 'Mitra',
            'email' => 'mitra@gmail.com',
            'password' => Hash::make('mitraGriya'),
        ]);
        $mitra->assignRole('mitra');

        $kontraktor = User::create([
            'name' => 'Kontraktor',
            'email' => 'kontraktor@gmail.com',
            'password' => Hash::make('kontraktorGriya'),
        ]);
        $kontraktor->assignRole('kontraktor');


    }
}
