<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WaliMuridNewsController extends Controller
{
    public function wali_murid_news_index()
    {
        return view('pages.wali_murid.news.index');
    }
}
