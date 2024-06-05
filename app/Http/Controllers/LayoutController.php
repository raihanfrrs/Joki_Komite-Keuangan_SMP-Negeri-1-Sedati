<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\NewsRepository;
use Illuminate\Support\Facades\Auth;

class LayoutController extends Controller
{
    protected $news;

    public function __construct(NewsRepository $newsRepository)
    {
        $this->news = $newsRepository;
    }

    public function index()
    {
        if (Auth::check()) {
            $this->news->updateStatusAllNews();
        }

        if (Auth::check() && auth()->user()->level == 'admin') {
            return view('pages.admin.dashboard.index', [
                'news' => $this->news->getAllNewsByLimit(4)
            ]);
        } elseif (Auth::check() && auth()->user()->level == 'wali murid') {
            return view('pages.wali_murid.dashboard.index', [
                'news' => $this->news->getAllNewsByLimit(4)
            ]);
        } else {
            return redirect()->route('login.wali.murid');
        }
    }
}
