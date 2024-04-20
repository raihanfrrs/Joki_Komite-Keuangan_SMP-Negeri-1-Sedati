<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class AdminClassController extends Controller
{
    public function admin_class_index()
    {
        return view('pages.admin.class.index');
    }

    public function admin_class_show(Kelas $class)
    {
        return view('pages.admin.class.show', compact('class'));
    }
}
