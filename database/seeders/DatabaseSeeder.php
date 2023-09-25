<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Str;
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

        User::factory()->create([
            'id' => Str::uuid(),
            'last_name' => 'Ouédraogo',
            'first_name' => 'Abdoul Aziz',
            'phone_number' => 73471085,
            'username' => 'ao627515',
            'role' => 'organizer',
            'password' => Hash::make('12345678'),
        ]);

        User::factory()->create([
            'id' => Str::uuid(),
            'last_name' => 'Simporé',
            'first_name' => 'Elie',
            'phone_number' => 71454901,
            'username' => 'simporeelie',
            'role' => 'organizer',
            'password' => Hash::make('12345678'),
        ]);

        User::factory()->create([
            'id' => Str::uuid(),
            'last_name' => 'So',
            'first_name' => 'Jonas',
            'phone_number' => 56785580,
            'username' => 'jonasdevpro',
            'role' => 'organizer',
            'password' => Hash::make('1234'),
        ]);
        
        User::factory()->create([
            'id' => Str::uuid(),
            'last_name' => 'Ouédraogo',
            'first_name' => 'Ibrahim',
            'phone_number' => 06030606,
            'username' => 'ib',
            'role' => 'organizer',
            'password' => Hash::make('12345678'),
        ]);
        User::factory()->create([
            'id' => Str::uuid(),
            'last_name' => 'Tapsoba',
            'first_name' => 'Faridatou',
            'phone_number' => 62027741,
            'username' => 'farida',
            'role' => 'organizer',
            'password' => Hash::make('12345678'),
        ]);

        User::factory()->create([
            'id' => Str::uuid(),
            'last_name' => 'Sanfo',
            'first_name' => 'Mahamadi',
            'phone_number' => 54585434,
            'username' => 'madi',
            'role' => 'organizer',
            'password' => Hash::make('12345678'),
        ]);

    }
}
