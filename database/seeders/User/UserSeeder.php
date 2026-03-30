<?php

namespace Database\Seeders\User;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => "Admin",
            'username' => "admin",
            'email' => "admin@gmail.com",
            'password' => Hash::make("123"),
        ]);

        $user->assignRole('Super Admin');


        $user = User::create([
            'name' => "Pak Novi",
            'username' => "Pak Novi",
            'email' => "pak_novi@gmail.com",
            'password' => Hash::make("123"),
        ]);

        $user->assignRole('Pak Novi');


        $user = User::create([
            'name' => "Acc Exata",
            'username' => "Acc Exata",
            'email' => "acc_exata@gmail.com",
            'password' => Hash::make("123"),
        ]);

        $user->assignRole('Acc Exata');


        $user = User::create([
            'name' => "HS",
            'username' => "HS",
            'email' => "hs@gmail.com",
            'password' => Hash::make("123"),
        ]);

        $user->assignRole('HS');


        $user = User::create([
            'name' => "CC",
            'username' => "CC",
            'email' => "cc@gmail.com",
            'password' => Hash::make("123"),
        ]);

        $user->assignRole('CC');


        $user = User::create([
            'name' => "Finance",
            'username' => "Finance",
            'email' => "finance@gmail.com",
            'password' => Hash::make("123"),
        ]);

        $user->assignRole('Finance');


        $user = User::create([
            'name' => "Sales",
            'username' => "Sales",
            'email' => "sales@gmail.com",
            'password' => Hash::make("123"),
        ]);

        $user->assignRole('Sales');
    }
}
