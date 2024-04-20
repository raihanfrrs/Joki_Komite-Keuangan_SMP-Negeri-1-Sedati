<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $keyType = "string";
    public $incrementing = false;
    protected $fillable = [
        'id',
        'admin_id',
        'title',
        'date',
        'description',
        'status'
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
