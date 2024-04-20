<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminNewsController extends Controller
{
    public function admin_news_index()
    {
        return view('pages.admin.news.index');
    }

    public function admin_news_create()
    {
        return view('pages.admin.news.add');
    }

    public function admin_news_show()
    {
        return view('pages.admin.news.show');

    }
}
