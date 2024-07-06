<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Payment extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $keyType = "string";
    public $incrementing = false;
    protected $fillable = [
        'id',
        'wali_murid_id',
        'admin_id',
        'name',
        'necessity',
        'date',
        'nominal',
        'status'
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('payment_files');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(368)
            ->height(232)
            ->sharpen(10);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function wali_murid()
    {
        return $this->belongsTo(WaliMurid::class);
    }
}
