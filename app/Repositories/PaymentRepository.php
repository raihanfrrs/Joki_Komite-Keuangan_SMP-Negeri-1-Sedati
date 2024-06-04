<?php

namespace App\Repositories;

use Ramsey\Uuid\Uuid;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PaymentRepository
{
    public function getAllPayments()
    {
        return Payment::all();
    }

    public function getPayment($id)
    {
        return Payment::find($id);
    }

    public function storePayment($data)
    {
        DB::transaction(function () use ($data) {
            $payment = Payment::create([
                'id' => Uuid::uuid4()->toString(),
                'wali_murid_id' => auth()->user()->wali_murid->id,
                'name' => $data['name'],
                'necessity' => $data['necessity'],
                'date' => $data['date'],
                'nominal' => $data['nominal']
            ]);

            if ($data->hasFile('payment_files')) {
                $media = $payment->addMedia($data->file('payment_files'))
                    ->withResponsiveImages()
                    ->toMediaCollection('payment_files');
        
                $media->update([
                    'model_id' => $payment->id,
                    'model_type' => Payment::class,
                ]);
            }
        });

        return true;
    }

    public function updatePayment($data, $payment)
    {
        DB::transaction(function () use ($data, $payment) {
            $payment->update([
                'name' => $data['name'],
                'necessity' => $data['necessity'],
                'date' => $data['date'],
                'nominal' => $data['nominal']
            ]);

            if ($data->hasFile('payment_files')) {
                if (!empty($data->old_media_uuid)) {
                    Media::where('uuid', $data->old_media_uuid)->where('model_type', Payment::class)->delete();
                }

                $media = $payment->addMedia($data->file('payment_files'))
                    ->withResponsiveImages()
                    ->toMediaCollection('payment_files');
        
                $media->update([
                    'model_id' => $payment->id,
                    'model_type' => Payment::class,
                ]);
            }
        });

        return true;
    }

    public function deletePayment($payment)
    {
        return $payment->media()->delete() && $payment->delete();
    }
}