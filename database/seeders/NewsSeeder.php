<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\News;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Admin::first();

        $news = [
            [
                'id' => Uuid::uuid4()->toString(),
                'admin_id' => $admin->id,
                'title' => 'Surat pemberitahuan iuran idhul adha 2024',
                'date' => now(),
                'status' => 'draft'
            ],
            [
                'id' => Uuid::uuid4()->toString(),
                'admin_id' => $admin->id,
                'title' => 'Surat pemberitahuan pemeliharaan asset kelas',
                'date' => now(),
                'status' => 'published'
            ],
            [
                'id' => Uuid::uuid4()->toString(),
                'admin_id' => $admin->id,
                'title' => 'Surat pemberitahuan rapat komite',
                'date' => now(),
                'status' => 'published'
            ],
            [
                'id' => Uuid::uuid4()->toString(),
                'admin_id' => $admin->id,
                'title' => 'Laporan keuangan bulan januari',
                'date' => now(),
                'status' => 'published'
            ],
            [
                'id' => Uuid::uuid4()->toString(),
                'admin_id' => $admin->id,
                'title' => 'Laporan asset kelas',
                'date' => now(),
                'status' => 'published'
            ],
            [
                'id' => Uuid::uuid4()->toString(),
                'admin_id' => $admin->id,
                'title' => 'Surat pemberitahuan iuran proyek P5',
                'date' => now(),
                'status' => 'published'
            ]
        ];

        foreach ($news as $key => $new) {
            News::create($new);
        }
    }
}
