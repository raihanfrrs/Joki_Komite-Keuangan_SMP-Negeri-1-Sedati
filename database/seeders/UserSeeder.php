<?php

namespace Database\Seeders;

use App\Models\User;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'id'=> Uuid::uuid4()->toString(),
                'username' => 'admin',
                'password' => bcrypt('admin123'),
                'level' => 'admin'
            ],
            [
                'id'=> Uuid::uuid4()->toString(),
                'username' => 'walimurid',
                'password' => bcrypt('walimurid123'),
                'level' => 'wali murid'
            ]
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
