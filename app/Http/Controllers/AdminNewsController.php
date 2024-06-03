<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsStoreRequest;
use App\Http\Requests\NewsUpdateRequest;
use App\Models\News;
use App\Repositories\NewsRepository;
use Illuminate\Http\Request;

class AdminNewsController extends Controller
{
    protected $news;

    public function __construct(NewsRepository $newsRepository)
    {
        $this->news = $newsRepository;
    }
    
    public function admin_news_index()
    {
        return view('pages.admin.news.index');
    }

    public function admin_news_create()
    {
        return view('pages.admin.news.add');
    }

    public function admin_news_store(NewsStoreRequest $request)
    {
        try {
            if ($request->validated()) {
                if ($this->news->storeNews($request)) {
                    return redirect()->back()->with([
                        'flash-type' => 'sweetalert',
                        'case' => 'default',
                        'position' => 'center',
                        'type' => 'success',
                        'message' => 'Berita Berhasil Dibuat!'
                    ]);
                }
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function admin_news_edit(News $news)
    {
        return view('pages.admin.news.edit', compact('news'));
    }

    public function admin_news_update(NewsUpdateRequest $request, News $news)
    {
        try {
            if ($request->validated()) {
                if ($this->news->updateNews($request, $news)) {
                    return redirect()->back()->with([
                        'flash-type' => 'sweetalert',
                        'case' => 'default',
                        'position' => 'center',
                        'type' => 'success',
                        'message' => 'Berita Berhasil Diupdate!'
                    ]);
                }
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function admin_news_show(News $news)
    {
        return view('pages.admin.news.show', compact('news'));
    }

    public function admin_news_destroy(News $news)
    {
        try {
            if ($this->news->deleteNews($news)) {
                return redirect()->back()->with([
                    'flash-type' => 'sweetalert',
                    'case' => 'default',
                    'position' => 'center',
                    'type' => 'success',
                    'message' => 'Berita Berhasil Dihapus!'
                ]);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
