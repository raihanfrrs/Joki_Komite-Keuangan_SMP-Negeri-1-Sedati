<?php

namespace App\Imports;

use App\Models\Murid;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class DaftarMuridKelasImport implements ToCollection
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
        if ($collection[0][0] != 'Murid' || $collection[0][1] != 'Wali Murid') {
            $this->importResult = [
                'status' => 'error',
                'message' => 'File Excel harus berisi kolom "Murid" dan "Wali Murid"!'
            ];
            return;
        }

        if (count($collection[0]) > 2) {
            $this->importResult = [
                'status' => 'error',
                'message' => 'File Excel maksimal 2 kolom!'
            ];
            return;
        }

        $indexKe = 1;

        Murid::where('wali_murid_id', auth()->user()->wali_murid->id)->delete();

        foreach ($collection as $key => $row) {
            if ($indexKe > 1) {
                $data['name'] = !empty($row[0]) ? $row[0] : null;
                $data['wali_murid'] = !empty($row[1]) ? $row[1] : null;

                Murid::create([
                    'id' => Uuid::uuid4()->toString(),
                    'wali_murid_id' => auth()->user()->wali_murid->id,
                    'kelas_id' => auth()->user()->wali_murid->kelas->id,
                    'name' => $data['name'],
                    'wali_murid' => $data['wali_murid'],
                ]);
            }

            $indexKe++;
        }
    }
}
