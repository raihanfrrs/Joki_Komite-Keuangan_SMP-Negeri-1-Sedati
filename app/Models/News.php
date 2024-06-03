<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class News extends Model implements Media
{
    use HasFactory, InteractsWithMedia;

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

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('news_files');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(368)
            ->height(232)
            ->sharpen(10);
    }
}
