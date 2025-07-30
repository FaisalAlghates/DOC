<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TestUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'test@test.com'],
            [
                'name' => 'Test User',
                'password' => Hash::make('password'),
                'role' => 'owner',
                'email_verified_at' => now(),
            ]
        );

        $this->command->info('Test user created: ' . $user->email . ' (ID: ' . $user->id . ')');
    }
}
