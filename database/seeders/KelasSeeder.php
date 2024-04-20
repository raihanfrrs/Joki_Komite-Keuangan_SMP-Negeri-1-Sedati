<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Kelas;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Admin::first();

        $class = [
            [
                'id' => Uuid::uuid4()->toString(),
                'admin_id' => $admin->id,
                'name' => '2.1'
            ],
            [
                'id' => Uuid::uuid4()->toString(),
                'admin_id' => $admin->id,
                'name' => '2.2'
            ],
            [
                'id' => Uuid::uuid4()->toString(),
                'admin_id' => $admin->id,
                'name' => '2.3'
            ],
            [
                'id' => Uuid::uuid4()->toString(),
                'admin_id' => $admin->id,
                'name' => '2.4'
            ],
            [
                'id' => Uuid::uuid4()->toString(),
                'admin_id' => $admin->id,
                'name' => '2.5'
            ],
            [
                'id' => Uuid::uuid4()->toString(),
                'admin_id' => $admin->id,
                'name' => '2.6'
            ],
        ];

        foreach ($class as $key => $kelas) {
            Kelas::create($kelas);
        }
    }
}
