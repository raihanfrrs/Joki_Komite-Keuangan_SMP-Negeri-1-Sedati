<?php 

namespace App\Repositories;

use App\Models\WaliMurid;
use Illuminate\Support\Facades\DB;

class WaliMuridRepository
{
    public function getAllWaliMurid()
    {
        return WaliMurid::all();
    }

    public function updateWaliMurid($request, $wali_murid)
    {
        DB::transaction(function () use ($request, $wali_murid) {
            $wali_murid->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone
            ]);
        });

        return true;
    }

    public function destroyWaliMurid($wali_murid)
    {
        return $wali_murid->delete();
    }
}