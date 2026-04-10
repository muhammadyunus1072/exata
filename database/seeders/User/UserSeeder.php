<?php

namespace Database\Seeders\User;

use App\Models\AlurPencairan\AlurPencairan;
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

        $user = User::create([
            'name' => "Admin",
            'username' => "admin",
            'email' => "admin@gmail.com",
            'password' => Hash::make("h5qlVDPMXL9OYQ1NYl71"),
            'color' => '#000000',
        ]);

        $user->assignRole(AlurPencairan::ROLE_SUPER_ADMIN);

        $user = User::create([
            'name' => "Febtio",
            'username' => "Febtio",
            'email' => "febtio.exataindonesia2019@gmail.com",
            'password' => Hash::make("123exata"),
            'color' => '#000000',
        ]);

        $user->assignRole(AlurPencairan::ROLE_SUPERVISOR);

        // PAK NOVI
        $user = User::create([
            'name' => "Novi Prayitno",
            'username' => "Novi Prayitno",
            'email' => "snoopy.exataindonesia2018@gmail.com",
            'password' => Hash::make("123exata"),
            'color' => '#f7bb3b',
        ]);

        $user->assignRole(AlurPencairan::ROLE_PAK_NOVI);


        // ACC EXATA
        $user = User::create([
            'name' => "Nurul",
            'username' => "Nurul",
            'email' => "nurul.exataindonesia2018@gmail.com",
            'password' => Hash::make("123exata"),
            'color' => '#6366F1',
        ]);

        $user->assignRole(AlurPencairan::ROLE_ACC_EXATA);


        // HS

        $user = User::create([
            'name' => "Vita",
            'username' => "Vita",
            'email' => "dira.exataindonesia2018@gmail.com",
            'password' => Hash::make("123exata"),
            'color' => '#A855F7',
        ]);
        $user->assignRole(AlurPencairan::ROLE_HS);

        $user = User::create([
            'name' => "Cynthia",
            'username' => "Cynthia",
            'email' => "amin.exataindonesia2021@gmail.com",
            'password' => Hash::make("123exata"),
            'color' => '#8B5CF6',
        ]);

        $user->assignRole(AlurPencairan::ROLE_HS);
        $user = User::create([
            'name' => "Mutia",
            'username' => "Mutia",
            'email' => "internship.exatagroup05@gmail.com",
            'password' => Hash::make("123exata"),
            'color' => '#64748B',
        ]);
        $user->assignRole(AlurPencairan::ROLE_HS);




        // CONTENT CREATOR
        $user = User::create([
            'name' => "Teddy",
            'username' => "Teddy",
            'email' => "teddy.exata@gmail.com",
            'password' => Hash::make("123exata"),
            'color' => '#d44e91',
        ]);

        $user->assignRole(AlurPencairan::ROLE_CC);
        $user = User::create([
            'name' => "Irfan",
            'username' => "Irfan",
            'email' => "arik.exataindonesia2019@gmail.com",
            'password' => Hash::make("suksesbersamaexata1"),
            'color' => '#c87482',
        ]);

        $user->assignRole(AlurPencairan::ROLE_CC);


        // FINANCE
        $user = User::create([
            'name' => "Rina",
            'username' => "Rina",
            'email' => "rinaexataindonesia@gmail.com",
            'password' => Hash::make("123exata"),
            'color' => '#ce45e3',
        ]);

        $user->assignRole(AlurPencairan::ROLE_FINANCE);

        // SALES
        $user = User::create([
            'name' => "Mukhamad Turhamun",
            'username' => "Mukhamad Turhamun",
            'email' => "kim.exataindonesia2018@gmail.com",
            'password' => Hash::make("SuksesBersama2620"),
            'color' => '#F97316',
        ]);
        $user->assignRole(AlurPencairan::ROLE_SALES);

        $user = User::create([
            'name' => "Selamet Syafaruddin",
            'username' => "Selamet Syafaruddin",
            'email' => "eza.exataindonesia2018@gmail.com",
            'password' => Hash::make("@Sukses2026Bisa"),
            'color' => '#FB923C',
        ]);

        $user->assignRole(AlurPencairan::ROLE_SALES);
        $user = User::create([
            'name' => "Ainul",
            'username' => "Ainul",
            'email' => "ajmain.exataindonesia2018@gmail.com",
            'password' => Hash::make("@Sukses2026Bisa"),
            'color' => '#eada67',
        ]);

        $user->assignRole(AlurPencairan::ROLE_SALES);
    }
}
