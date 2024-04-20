<?php

namespace App\Repositories;

use App\Models\Kelas;

class ClassRepository
{
    public function getAllClasses()
    {
        return Kelas::all();
    }

    public function getClass($id)
    {
        return Kelas::find($id);
    }
}