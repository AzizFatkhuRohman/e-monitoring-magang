<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            'password'=>bcrypt('admin_akti_2024'),
            'role'=>'admin'
        ]);
    }
}
