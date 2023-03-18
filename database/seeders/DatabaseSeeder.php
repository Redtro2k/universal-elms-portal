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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\User::create([
        'firstname' => 'Darwin',
        'lastname' => 'Llacuna',
        'userid' => '02000011885',
        'gender' => 'male',
        'contact_number' => '09692218787',
        'emergency_contact_number' => '09692218787',
        'date_of_birth' => '2022-03-11 12:00:00',
        'location' => 'bgry. bagong silangan QC',
        'email' => 'llacuna@dev.com',
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi']); //password
    }
}
