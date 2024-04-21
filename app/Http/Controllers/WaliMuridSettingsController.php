<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WaliMuridSettingsController extends Controller
{
    public function wali_murid_setting_index()
    {
        return view('pages.wali_murid.setting.index');
    }
}
