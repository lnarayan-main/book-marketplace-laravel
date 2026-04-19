<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@bookmarket.com'], // Search by email
            [
                'name' => 'System Admin',
                'password' => Hash::make('Admin@123'), // Use a strong password
                'role' => 2, // 2 = Admin
                'email_verified_at' => now(), // Mark as verified immediately
            ]
        );
    }
}
