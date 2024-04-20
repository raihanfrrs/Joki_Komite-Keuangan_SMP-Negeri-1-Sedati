<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminSettingsController extends Controller
{
    public function admin_setting_index()
    {
        return view('pages.admin.setting.index');
    }
}
