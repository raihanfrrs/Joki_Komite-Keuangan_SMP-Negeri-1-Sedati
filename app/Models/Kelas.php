<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $keyType = "string";
    public $incrementing = false;
    protected $fillable = [
        'id',
        'admin_id',
        'name'
    ];
    
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function wali_murid()
    {
        return $this->hasOne(WaliMurid::class);
    }

    public function murid()
    {
        return $this->hasMany(Murid::class);
    }
}
