<?php

namespace Database\Seeders;

use App\Models\Kelas;
use App\Models\User;
use Ramsey\Uuid\Uuid;
use App\Models\WaliMurid;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WaliMuridSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $wali_murids = User::where('level', 'wali murid')->get();
        $kelas = Kelas::all();

        foreach ($wali_murids as $key => $wali_murid) {
            WaliMurid::create([
                'id' => Uuid::uuid4()->toString(),
                'user_id' => $wali_murid->id,
                'kelas_id' => $kelas[$key]->id,
                'name' => 'Yoga Pratama',
                'email' => 'yogapratama76@gmail.com',
                'phone' => '081234567890'
            ]);
        }
    }
}
