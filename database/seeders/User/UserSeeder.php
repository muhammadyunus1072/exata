<?php

namespace Database\Seeders\User;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (App::environment('local')) {

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
        if (App::environment('production')) {

            $user = User::create([
                'name' => "Admin",
                'username' => "admin",
                'email' => "admin@gmail.com",
                'password' => Hash::make("h5qlVDPMXL9OYQ1NYl71"),
            ]);

            $user->assignRole('Super Admin');

            // PAK NOVI
            $user = User::create([
                'name' => "Novi Prayitno",
                'username' => "Novi Prayitno",
                'email' => "snoopy.exataindonesia2018@gmail.com",
                'password' => Hash::make("123exata"),
            ]);

            $user->assignRole('Pak Novi');


            // ACC EXATA
            $user = User::create([
                'name' => "Nurul - Acc Exata",
                'username' => "Nurul",
                'email' => "nurul.exataindonesia2018@gmail.com",
                'password' => Hash::make("123exata"),
            ]);

            $user->assignRole('Acc Exata');


            // HS
            $user = User::create([
                'name' => "HS",
                'username' => "HS",
                'email' => "hs@gmail.com",
                'password' => Hash::make("123exata"),
            ]);

            $user->assignRole('HS');


            // CONTENT CREATOR
            $user = User::create([
                'name' => "Teddy",
                'username' => "Teddy - Content Creator",
                'email' => "teddy.exata@gmail.com",
                'password' => Hash::make("123exata"),
            ]);

            $user->assignRole('CC');
            $user = User::create([
                'name' => "Irfan",
                'username' => "Irfan - Content Creator",
                'email' => "arik.exataindonesia2019@gmail.com",
                'password' => Hash::make("suksesbersamaexata1"),
            ]);

            $user->assignRole('CC');


            // FINANCE
            $user = User::create([
                'name' => "Rina",
                'username' => "Rina - Finance",
                'email' => "rinaexataindonesia@gmail.com",
                'password' => Hash::make("123exata"),
            ]);

            $user->assignRole('Finance');

            // SALES
            $user = User::create([
                'name' => "Mukhamad Turhamun",
                'username' => "Mukhamad Turhamun",
                'email' => "kim.exataindonesia2018@gmail.com",
                'password' => Hash::make("SuksesBersama2620"),
            ]);
            $user->assignRole('Sales');

            $user = User::create([
                'name' => "Selamet Syafaruddin",
                'username' => "Selamet Syafaruddin",
                'email' => "eza.exataindonesia2018@gmail.com",
                'password' => Hash::make("@Sukses2026Bisa"),
            ]);

            $user->assignRole('Sales');
        }
    }
}
