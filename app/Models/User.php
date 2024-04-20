<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\WaliMurid;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $keyType = "string";
    public $incrementing = false;
    protected $fillable = [
        'id',
        'username',
        'password',
        'level'
    ];

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }

    public function wali_murid()
    {
        return $this->hasOne(WaliMurid::class);
    }
}
