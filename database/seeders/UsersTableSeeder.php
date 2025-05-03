<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

User::firstOrCreate(
    ['email' => 'test@example.com'],
    [
        'name' => 'Test User',
        'password' => bcrypt('password'), // বা Hash::make()
    ]
);


