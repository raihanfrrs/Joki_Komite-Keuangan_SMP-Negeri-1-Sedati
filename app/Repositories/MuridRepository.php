<?php

namespace App\Repositories;

use App\Models\Murid;
use Illuminate\Support\Facades\DB;

class MuridRepository
{
    public function getAllMurid()
    {
        return Murid::all();
    }

    public function getAllMuridByWaliMurid()
    {
        return Murid::where('wali_murid_id', auth()->user()->wali_murid->id)->get();
    }

    public function updateMurid($data, $murid)
    {
        DB::transaction(function () use ($data, $murid) {
            $murid->update([
                'name' => $data['name'],
                'wali_murid' => $data['wali_murid'],
            ]);
        });

        return true;
    }

    public function deleteMurid($murid)
    {
        return $murid->delete();
    }
}