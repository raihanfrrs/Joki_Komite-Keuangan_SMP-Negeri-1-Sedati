<?php

namespace Database\Seeders;

use App\Models\Payment;
use Ramsey\Uuid\Uuid;
use App\Models\WaliMurid;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $wali_murid = WaliMurid::first();

        $payments = [
            [
                'id' => Uuid::uuid4()->toString(),
                'wali_murid_id' => $wali_murid->id,
                'name' => 'Noval Andriansyah',
                'necessity' => 'Sumbangan aset kelas',
                'date' => now(),
                'nominal' => 200000
            ],
            [
                'id' => Uuid::uuid4()->toString(),
                'wali_murid_id' => $wali_murid->id,
                'name' => 'Noval Andriansyah',
                'necessity' => 'Sumbangan aset kelas',
                'date' => now(),
                'nominal' => 200000
            ],
            [
                'id' => Uuid::uuid4()->toString(),
                'wali_murid_id' => $wali_murid->id,
                'name' => 'Noval Andriansyah',
                'necessity' => 'Sumbangan aset kelas',
                'date' => now(),
                'nominal' => 200000
            ],
            [
                'id' => Uuid::uuid4()->toString(),
                'wali_murid_id' => $wali_murid->id,
                'name' => 'Noval Andriansyah',
                'necessity' => 'Sumbangan aset kelas',
                'date' => now(),
                'nominal' => 200000
            ],
            [
                'id' => Uuid::uuid4()->toString(),
                'wali_murid_id' => $wali_murid->id,
                'name' => 'Noval Andriansyah',
                'necessity' => 'Sumbangan aset kelas',
                'date' => now(),
                'nominal' => 200000
            ]
        ];

        foreach ($payments as $payment) {
            Payment::create($payment);
        }
    }
}
