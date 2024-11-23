<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pemilikRole = Role::create([
            'name' => 'pemilik'
        ]);

        $pembeliRole = Role::create([
            'name' => 'pembeli'
        ]);

        //memberi sebuah role user ke pemilik
        $user = User::create([
            'name' => 'Najwa Pemilik',
            'email' => 'najwa@pemilik.com',
            'password' => bcrypt('12345678') //karna laravel menggunakan encripte kita tambahkana perintah decript
        ]);
        $user->assignRole($pemilikRole); //memberika role pemilik ke user najwa
    }
}
