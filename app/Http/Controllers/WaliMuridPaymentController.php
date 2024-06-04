<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentStoreRequest;
use App\Http\Requests\PaymentUpdateRequest;
use App\Models\Payment;
use App\Repositories\PaymentRepository;
use Illuminate\Http\Request;

class WaliMuridPaymentController extends Controller
{
    protected $payment;

    public function __construct(PaymentRepository $paymentRepository)
    {
        $this->payment = $paymentRepository;
    }

    public function wali_murid_payment_index()
    {
        return view('pages.wali_murid.payment.index');
    }

    public function wali_murid_payment_create()
    {
        return view('pages.wali_murid.payment.add');
    }

    public function wali_murid_payment_store(PaymentStoreRequest $request)
    {
        try {
            if ($request->validated()) {
                if ($this->payment->storePayment($request)) {
                    return redirect()->back()->with([
                        'flash-type' => 'sweetalert',
                        'case' => 'default',
                        'position' => 'center',
                        'type' => 'success',
                        'message' => 'Pembayaran Berhasil Dibuat!'
                    ]);
                }
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function wali_murid_payment_edit(Payment $payment)
    {
        return view('pages.wali_murid.payment.edit', compact('payment'));
    }

    public function wali_murid_payment_update(PaymentUpdateRequest $request, Payment $payment)
    {
        try {
            if ($request->validated()) {
                if ($this->payment->updatePayment($request, $payment)) {
                    return redirect()->back()->with([
                        'flash-type' => 'sweetalert',
                        'case' => 'default',
                        'position' => 'center',
                        'type' => 'success',
                        'message' => 'Pembayaran Berhasil Diubah!'
                    ]);
                }
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function wali_murid_payment_show(Payment $payment)
    {
        return view('pages.wali_murid.payment.show', compact('payment'));
    }

    public function wali_murid_payment_destroy(Payment $payment)
    {
        try {
            if ($this->payment->deletePayment($payment)) {
                return redirect()->back()->with([
                    'flash-type' => 'sweetalert',
                    'case' => 'default',
                    'position' => 'center',
                    'type' => 'success',
                    'message' => 'Pembayaran Berhasil Dihapus!'
                ]);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
