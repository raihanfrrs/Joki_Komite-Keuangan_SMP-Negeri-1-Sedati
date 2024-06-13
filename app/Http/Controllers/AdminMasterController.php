<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ExportTemplateExcel;
use App\Imports\DaftarWaliMuridImport;
use Maatwebsite\Excel\Facades\Excel;

class AdminMasterController extends Controller
{
    
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
}
