<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Admin extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $keyType = "string";
    public $incrementing = false;
    protected $fillable = [
        'id',
        'user_id',
        'name',
        'email',
        'phone'
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('admin_images');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(368)
            ->height(232)
            ->sharpen(10);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }

    public function payment()
    {
        return $this->hasMany(Payment::class);
    }
}
