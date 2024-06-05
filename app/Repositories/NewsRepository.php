<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\News;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class NewsRepository
{
    public function getAllNews()
    {
        return News::all();
    }

    public function getAllNewsByLimit($limit)
    {
        return News::limit($limit)->get();
    }

    public function getAllNewsWithPulishedStatus()
    {
        return News::where('status', 'published')->get();
    }

    public function getNew($id)
    {
        return News::find($id);
    }

    public function getTotalNewsThisMonth(){
        return News::where('status', 'published')
                    ->whereMonth('created_at', date('m'))
                    ->get();
    }

    public function storeNews($data)
    {
        DB::transaction(function () use ($data) {
            $requestDate = Carbon::parse($data['date']);
            $today = Carbon::today();

            $news = News::create([
                'id' => Uuid::uuid4()->toString(),
                'admin_id' => auth()->user()->admin->id,
                'title' => $data['title'],
                'slug' => Str::slug($data['title']),
                'date' => $data['date'],
                'description' => $data['description'],
                'status' => $requestDate == $today ? 'published' : 'draft'
            ]);

            if ($data->hasFile('news_files')) {
                foreach ($data->file('news_files') as $key => $file) {
                    $media = $news->addMedia($file)
                        ->withResponsiveImages()
                        ->toMediaCollection('news_files');
            
                    $media->update([
                        'model_id' => $news->id,
                        'model_type' => News::class,
                    ]);
                }
            }
        });

        return true;
    }

    public function updateNews($data, $news)
    {
        DB::transaction(function () use ($data, $news) {
            $requestDate = Carbon::parse($data['date']);
            $today = Carbon::today();

            $news->update([
                'title' => $data['title'],
                'slug' => Str::slug($data['title']),
                'date' => $data['date'],
                'description' => $data['description'],
                'status' => $requestDate == $today && $news->status == 'published' ? 'published' : 'draft'
            ]);

            if ($data->hasFile('news_files')) {
                if (!empty($data->old_media_uuid)) {
                    foreach ($data->old_media_uuid as $key => $uuid) {
                        Media::where('uuid', $uuid)->where('model_type', News::class)->delete();
                    }
                }

                foreach ($data->file('news_files') as $key => $file) {
                        $media = $news->addMedia($file)
                            ->withResponsiveImages()
                            ->toMediaCollection('news_files');
                
                        $media->update([
                            'model_id' => $news->id,
                            'model_type' => News::class,
                        ]);
                    }
                }
        });

        return true;
    }

    public function deleteNews($news)
    {
        return $news->media()->delete() && $news->delete();
    }

    public function updateStatusAllNews()
    {
        return News::whereDate('date', Carbon::today())->update(['status' => 'published']);
    }
}