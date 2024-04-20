<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $keyType = "string";
    public $incrementing = false;
    protected $fillable = [
        'id',
        'wali_murid_id',
        'admin_id',
        'name',
        'necessity',
        'date',
        'nominal'
    ];
}
