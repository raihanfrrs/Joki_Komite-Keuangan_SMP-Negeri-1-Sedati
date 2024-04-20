<?php

namespace App\Repositories;

use App\Models\News;

class NewsRepository
{
    public function getAllNews()
    {
        return News::all();
    }

    public function getNew($id)
    {
        return News::find($id);
    }
}