<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ! Normally, these would be split between other files.
        // ! But due to this being a demo, we will put them all
        // ! here.

        \App\Models\User::create([
            'name' => 'Jon Doe',
            'email' => 'test@test.com',
            'password' => Hash::make('password'),
        ]);

        \App\Models\Shipment::factory(5)
            ->withEvents()
            ->withPackages()
            ->create();
    }
}
