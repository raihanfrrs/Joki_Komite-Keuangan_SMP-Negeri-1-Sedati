<?php 

namespace App\Repositories;

use App\Models\WaliMurid;

class WaliMuridRepository
{
    public function getAllWaliMurid()
    {
        return WaliMurid::all();
    }
}