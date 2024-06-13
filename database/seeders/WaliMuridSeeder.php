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
        $kelas = Kelas::all(); // ambil seluruh kelas

        foreach ($kelas as $key => $item) {
            $wali_murids = User::where('level', 'wali murid'); // sorting data user berdasarkan level wali murid 

            if ($item->name == '2.1') { // sesuaikan dengan nama kelas yang diinginkan
                $user_id = $wali_murids->where('username', 'walimurid'); // ambil data wali murid dengan username yang diinginkan

                WaliMurid::create([ // proses insert data wali murid
                    'id' => Uuid::uuid4()->toString(),
                    'user_id' => $user_id->first()->id,
                    'kelas_id' => $item->id,
                    'name' => 'Yoga Pratama',
                    'email' => 'yogapratama76@gmail.com',
                    'phone' => '081234567890'
                ]);
            }

            if ($item->name == '2.2') {
                $user_id = $wali_murids->where('username', 'andi');

                WaliMurid::create([
                    'id' => Uuid::uuid4()->toString(),
                    'user_id' => $wali_murids->first()->id,
                    'kelas_id' => $item->id,
                    'name' => 'Yoga Pratama',
                    'email' => 'yogapratama76@gmail.com',
                    'phone' => '081234567890'
                ]);
            }

            if ($item->name == '2.3') {
                $user_id = $wali_murids->where('username', 'budi');

                WaliMurid::create([
                    'id' => Uuid::uuid4()->toString(),
                    'user_id' => $wali_murids->first()->id,
                    'kelas_id' => $item->id,
                    'name' => 'Yoga Pratama',
                    'email' => 'yogapratama76@gmail.com',
                    'phone' => '081234567890'
                ]);
            }
        }
    }
}
