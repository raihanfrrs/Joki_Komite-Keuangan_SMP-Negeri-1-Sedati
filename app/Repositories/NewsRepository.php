<?php

namespace App\Repositories;

use App\Models\News;

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

    public function getNew($id)
    {
        return News::find($id);
    }
}