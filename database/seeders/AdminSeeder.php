<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = User::where('level', 'admin')->get();

        foreach ($admins as $key => $admin) {
            Admin::create([
                'id' => Uuid::uuid4()->toString(),
                'user_id' => $admin->id,
                'name' => 'Budi Santoso',
                'email' => 'budisantoso76@gmail.com',
                'phone' => '081234567890'
            ]);
        }
    }
}
