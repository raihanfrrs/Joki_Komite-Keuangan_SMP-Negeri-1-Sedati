<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LayoutController extends Controller
{
    public function index()
    {
        if (Auth::check() && auth()->user()->level == 'admin') {
            return view('pages.admin.dashboard.index');
        } elseif (Auth::check() && auth()->user()->level == 'wali murid') {
            return view('pages.wali_murid.dashboard.index');
        } else {
            return redirect()->route('login.wali.murid');
        }
    }
}
