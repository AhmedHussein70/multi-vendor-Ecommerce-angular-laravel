<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Mohamed',
            'email' => 'mmmm@gmail.com', // Fixed email typo ("gmail" instead of "gamil")
            'password' => Hash::make('123123123'), // Ensure the password is hashed
        ]);
    }
}
