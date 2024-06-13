<?php

namespace App\Http\Controllers;

use App\Models\WaliMurid;
use Illuminate\Http\Request;
use App\Exports\ExportTemplateExcel;
use App\Http\Requests\AdminWaliMuridUpdateRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DaftarWaliMuridImport;
use App\Repositories\WaliMuridRepository;

class AdminMasterController extends Controller
{
    protected $wali_murid;

    public function __construct(WaliMuridRepository $wali_muridRepository)
    {
        $this->wali_murid = $wali_muridRepository;
    }
    
    public function admin_master_wali_murid_index()
    {
        return view('pages.admin.master.wali_murid.index');
    }

    public function admin_master_wali_murid_export_template()
    {
        return Excel::download(new ExportTemplateExcel('export-wali-murid'), 'template-wali-murid.xlsx');
    }

    public function admin_master_wali_murid_import_wali_murid(Request $request)
    {
        $import = new DaftarWaliMuridImport();
        Excel::import($import, $request->file('file'));

        return redirect()->back()->with([
            'flash-type' => 'sweetalert',
            'case' => 'default',
            'position' => 'center',
            'type' => $import->importResult['status'],
            'message' => $import->importResult['message']
        ]);
    }

    public function admin_master_wali_murid_edit(WaliMurid $wali_murid)
    {
        return view('pages.admin.master.wali_murid.edit', compact('wali_murid'));
    }

    public function admin_master_wali_murid_update(AdminWaliMuridUpdateRequest $request, WaliMurid $wali_murid)
    {
        try {
            if ($request->validated()) {
                if ($this->wali_murid->updateWaliMurid($request, $wali_murid)) {
                    return redirect()->back()->with([
                        'flash-type' => 'sweetalert',
                        'case' => 'default',
                        'position' => 'center',
                        'type' => 'success',
                        'message' => 'Berhasil Perbarui!'
                    ]);
                }
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function admin_master_wali_murid_destroy(WaliMurid $wali_murid)
    {
        try {
            if ($this->wali_murid->destroyWaliMurid($wali_murid)) {
                return redirect()->back()->with([
                    'flash-type' => 'sweetalert',
                    'case' => 'default',
                    'position' => 'center',
                    'type' => 'success',
                    'message' => 'Berhasil Dihapus!'
                ]);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
