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

        \App\Models\Admin::create([
            'name'              => "Admin",
            'email'             => "admin@example.com",
            'email_verified_at' => now(),
            'password'          => '$2a$12$S1IU7MDAhTwQ0a2KaBGjmOYpVuDwWOKWsp0xpi43/RMcP3ZnlJGIO', // 12..78
            'remember_token'    => str()->random(10),
        ]);
    }
}
