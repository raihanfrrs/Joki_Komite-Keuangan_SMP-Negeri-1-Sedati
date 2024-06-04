<?php

namespace App\Http\Controllers;

use App\Models\News;
use Carbon\Carbon;
use ZanySoft\Zip\Facades\Zip;
use Illuminate\Support\Facades\Response;

class WaliMuridNewsController extends Controller
{
    public function wali_murid_news_index()
    {
        return view('pages.wali_murid.news.index');
    }
    
    public function wali_murid_news_show(News $news)
    {
        return view('pages.wali_murid.news.show', compact('news'));
    }

    public function wali_murid_news_download(News $news)
    {
        $zipFileName = 'Berita_' . $news->slug . '_' . Carbon::now()->format('Y-m-d') . '.zip';
        $zip = Zip::create(public_path($zipFileName));

        foreach ($news->getMedia('news_files') as $media) {
            $filePath = $media->getPath();
            $fileName = $media->file_name;
            
            $zip->add($filePath, $fileName);
        }

        $zip->close();

        return response()->download(public_path($zipFileName))->deleteFileAfterSend(true);
    }
}
