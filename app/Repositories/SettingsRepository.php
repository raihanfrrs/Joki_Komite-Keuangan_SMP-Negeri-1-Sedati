<?php

namespace App\Repositories;

use App\Models\Admin;
use App\Models\WaliMurid;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class SettingsRepository
{
    public function wali_murid_update($data)
    {
        DB::transaction(function () use ($data) {
            auth()->user()->wali_murid->update([
                'name' => $data->name,
                'email' => $data->email,
                'phone' => $data->phone
            ]);

            if (!empty($data->password)) {
                auth()->user->update([
                    'password' => bcrypt($data->password)
                ]);
            }

            if ($data->hasFile('wali_murid_images')) {
                if (!empty($data->old_media_uuid)) {
                    Media::where('uuid', $data->old_media_uuid)->where('model_type', WaliMurid::class)->delete();
                }

                $media = auth()->user()->wali_murid->addMedia($data->file('wali_murid_images'))
                    ->withResponsiveImages()
                    ->toMediaCollection('wali_murid_images');
        
                $media->update([
                    'model_id' => auth()->user()->wali_murid->id,
                    'model_type' => WaliMurid::class,
                ]);
            }
        });

        return true;
    }

    public function admin_update($data)
    {
        DB::transaction(function () use ($data) {
            auth()->user()->admin->update([
                'name' => $data->name,
                'email' => $data->email,
                'phone' => $data->phone
            ]);

            if (!empty($data->password)) {
                auth()->user->update([
                    'password' => bcrypt($data->password)
                ]);
            }

            if ($data->hasFile('admin_images')) {
                if (!empty($data->old_media_uuid)) {
                    Media::where('uuid', $data->old_media_uuid)->where('model_type', Admin::class)->delete();
                }

                $media = auth()->user()->admin->addMedia($data->file('admin_images'))
                    ->withResponsiveImages()
                    ->toMediaCollection('admin_images');
        
                $media->update([
                    'model_id' => auth()->user()->admin->id,
                    'model_type' => Admin::class,
                ]);
            }
        });

        return true;
    }
}