<?php

namespace App\Repositories;

use Carbon\Carbon;
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

    public function getAllPaymentsByWaliMurid()
    {
        return Payment::where('wali_murid_id', auth()->user()->wali_murid->id)->get();
    }

    public function getPayment($id)
    {
        return Payment::find($id);
    }

    public function getAllPaymentsByApproveStatus(){
        return Payment::where('status', 'approve')->get();
    }

    public function getTotalPaymentThisMonth($status){
        return Payment::whereMonth('created_at', date('m'))
                        ->where('status', $status)
                        ->get();
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

    public function updateStatusPayment($payment, $type)
    {
        return $payment->update([
            'admin_id' => auth()->user()->admin->id,
            'status' => $type
        ]);
    }

    public function getAllPaymentsGroupByPeriodically($periodic)
    {
        $groupByClause = '';

        switch ($periodic) {
            case 'day':
                $groupByClause = DB::raw('DATE(payments.created_at) as period');
                break;
            case 'month':
                $groupByClause = DB::raw('DATE_FORMAT(payments.created_at, "%M-%Y") as period');
                break;
            case 'year':
                $groupByClause = DB::raw('YEAR(payments.created_at) as period');
                break;
            default:
                break;
        }

        return Payment::select(DB::raw('SUM(nominal) as total_nominal'), DB::raw('COUNT(payments.id) as total_amount'), $groupByClause)
            ->where('status', 'approve')
            ->groupBy('period')
            ->get();
    }

    public function getAllPaymentsByYear($year)
    {
        return Payment::where('status', 'approve')
                        ->whereYear('created_at', $year)
                        ->get();
    }

    public function getAllPaymentsByMonth($month)
    {
        $timestamp = Carbon::createFromFormat('F-Y', $month)->startOfMonth();

        return Payment::where('status', 'approve')
                        ->whereBetween('created_at', [$timestamp->format('Y-m-d H:i:s'), $timestamp->endOfMonth()->format('Y-m-d H:i:s')])
                        ->get();
    }

    public function getAllPaymentsByDay($day)
    {
        $timestamp = strtotime($day);

        return Payment::where('status', 'approve')
                        ->whereDate('created_at', '=', date('Y-m-d', $timestamp))
                        ->get();
    }
}