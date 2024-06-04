<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    use HasFactory;

    protected $keyType = "string";
    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'wali_murid_id',
        'kelas_id',
        'name',
        'wali_murid'
    ];

    public function wali_murid()
    {
        return $this->belongsTo(WaliMurid::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
