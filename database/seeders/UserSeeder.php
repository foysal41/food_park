<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            ['name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => 'admin1234'//password
        ],

        ['name' => 'User',
            'email' => 'user@gmail.com',
            'role' => 'user',
            'password' => 'user1234'//password
        ],
        ]);
    }
}
