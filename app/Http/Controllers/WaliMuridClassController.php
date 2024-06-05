<?php

namespace App\Http\Controllers;

use App\Models\Murid;
use Illuminate\Http\Request;
use App\Exports\ExportTemplateExcel;
use Maatwebsite\Excel\Facades\Excel;
use App\Repositories\MuridRepository;
use App\Imports\DaftarMuridKelasImport;
use App\Http\Requests\WaliMuridKelasUpdateRequest;

class WaliMuridClassController extends Controller
{
    protected $murid;

    public function __construct(MuridRepository $muridRepository)
    {
        $this->murid = $muridRepository;
    }

    public function wali_murid_class_index()
    {
        return view('pages.wali_murid.class.index');
    }

    public function wali_murid_export_template()
    {
        return Excel::download(new ExportTemplateExcel, 'template-wali-murid.xlsx');
    }

    public function wali_murid_import_murid(Request $request)
    {
        $import = new DaftarMuridKelasImport();
        Excel::import($import, $request->file('file'));

        return redirect()->back()->with([
            'flash-type' => 'sweetalert',
            'case' => 'default',
            'position' => 'center',
            'type' => $import->importResult['status'],
            'message' => $import->importResult['message']
        ]);
    }

    public function wali_murid_class_edit(Murid $murid)
    {
        return view('pages.wali_murid.class.edit', compact('murid'));
    }

    public function wali_murid_class_update(WaliMuridKelasUpdateRequest $request, Murid $murid)
    {
        try {
            if ($request->validated()) {
                if ($this->murid->updateMurid($request, $murid)) {
                    return redirect()->back()->with([
                        'flash-type' => 'sweetalert',
                        'case' => 'default',
                        'position' => 'center',
                        'type' => 'success',
                        'message' => 'Murid Berhasil Diupdate!'
                    ]);
                }
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function wali_murid_class_destroy(Murid $murid)
    {
        try {
            if ($this->murid->deleteMurid($murid)) {
                return redirect()->back()->with([
                    'flash-type' => 'sweetalert',
                    'case' => 'default',
                    'position' => 'center',
                    'type' => 'success',
                    'message' => 'Murid Berhasil Dihapus!'
                ]);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
