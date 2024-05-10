<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'nama' => 'Admin Akti',
            'nomor_induk' => 'admin_akti_2024',
            'password' => Hash::make('akti2024'),
            'role' => 'admin'
        ]);
        \App\Models\User::create([
            'nama' => 'Jono Akti',
            'nomor_induk' => '19331928',
            'password' => Hash::make('akti2024'),
            'role' => 'mahasiswa'
        ]);
        \App\Models\User::create([
            'nama' => 'Joni Akti',
            'nomor_induk' => '18801980',
            'password' => Hash::make('akti2024'),
            'role' => 'departement'
        ]);
        \App\Models\User::create([
            'nama' => 'Jajang Akti',
            'nomor_induk' => '16601960',
            'password' => Hash::make('akti2024'),
            'role' => 'mentor'
        ]);
        \App\Models\User::create([
            'nama' => 'Rahmat Akti',
            'nomor_induk' => '12201920',
            'password' => Hash::make('akti2024'),
            'role' => 'section'
        ]);
        \App\Models\User::create([
            'nama' => 'Akmal Akti',
            'nomor_induk' => '19952025',
            'password' => Hash::make('akti2024'),
            'role' => 'dosen'
        ]);
    }
}
