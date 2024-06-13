<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Kelas;
use Ramsey\Uuid\Uuid;
use App\Models\WaliMurid;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class DaftarWaliMuridImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public $importResult = [
        'status' => 'success',
        'message' => 'Import berhasil'
    ];

    public function collection(Collection $collection)
    {
        if ($collection[0][0] != 'Username' || $collection[0][1] != 'Password' || $collection[0][2] != 'Kelas' || $collection[0][3] != 'Nama Wali Murid' || $collection[0][4] != 'Ponsel' || $collection[0][5] != 'Surel') {
            $this->importResult = [
                'status' => 'error',
                'message' => 'File Excel harus berisi kolom "Username", "Password", "Kelas", "Nama Wali Murid", "Ponsel" dan "Surel"!'
            ];
            return;
        }

        if (count($collection[0]) > 6) {
            $this->importResult = [
                'status' => 'error',
                'message' => 'File Excel maksimal 6 kolom!'
            ];
            return;
        }

        foreach (User::where('level', 'wali_murid')->get() as $key => $users) {
            $users->delete();
        }

        foreach (Kelas::all() as $key => $kelas) {
            $kelas->delete();
        }

        foreach (WaliMurid::all() as $key => $walimurid) {
            $walimurid->delete();
        }

        $indexKe = 1;

        foreach ($collection as $key => $row) {
            if ($indexKe > 1) {
                $data['username'] = !empty($row[0]) ? $row[0] : null;
                $data['password'] = !empty($row[1]) ? $row[1] : null;
                $data['kelas'] = !empty($row[2]) ? $row[2] : null;
                $data['name'] = !empty($row[3]) ? $row[3] : null;
                $data['ponsel'] = !empty($row[4]) ? $row[4] : null;
                $data['surel'] = !empty($row[5]) ? $row[5] : null;

                $user = User::create([
                    'id' => Uuid::uuid4()->toString(),
                    'username' => $data['username'],
                    'password' => bcrypt($data['password'])
                ]);

                $kelas = Kelas::create([
                    'id' => Uuid::uuid4()->toString(),
                    'admin_id' => auth()->user()->admin->id,
                    'name' => $data['kelas']
                ]);

                WaliMurid::create([
                    'id' => Uuid::uuid4()->toString(),
                    'user_id' => $user->id,
                    'kelas_id' => $kelas->id,
                    'name' => $data['name'],
                    'phone' => $data['ponsel'],
                    'email' => $data['surel']
                ]);
            }

            $indexKe++;
        }
    }
}
