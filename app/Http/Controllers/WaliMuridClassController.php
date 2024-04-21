<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WaliMuridClassController extends Controller
{
    public function wali_murid_class_index()
    {
        return view('pages.wali_murid.class.index');
    }
}
