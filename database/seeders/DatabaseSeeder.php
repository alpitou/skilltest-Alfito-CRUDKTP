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
        $roles = [
            [
                'name' => 'admin',
            ],
            [
                'name' => 'user',
            ]
        ];
        foreach ($roles as $role) {
            \App\Models\Role::create([
                'name' => $role['name'],
            ]);
        }

        $users = [
            [
                'username' => 'admin',
                'password' => bcrypt('admin123'),
                'role_id' => 1
            ],
            [
                'username' => 'user',
                'password' => bcrypt('user123'),
                'role_id' => 2
            ]
        ];
        foreach ($users as $user) {
            \App\Models\User::create([
                'username' => $user['username'],
                'password' => $user['password'],
                'role_id' => $user['role_id'],
            ]);
        }
        
        \App\Models\Resident::factory(10000)->create();

    }
}
