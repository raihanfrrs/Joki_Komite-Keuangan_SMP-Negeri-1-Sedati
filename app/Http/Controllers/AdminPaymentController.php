<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Repositories\PaymentRepository;

class AdminPaymentController extends Controller
{
    protected $payment;

    public function __construct(PaymentRepository $paymentRepository)
    {
        $this->payment = $paymentRepository;
    }

    public function admin_payment_index()
    {
        return view('pages.admin.payment.index');
    }

    public function admin_payment_show(Payment $payment)
    {
        return view('pages.admin.payment.show', compact('payment'));
    }

    public function admin_payment_update_status(Payment $payment, $type)
    {
        try {
            if ($this->payment->updateStatusPayment($payment, $type)) {
                return redirect()->back()->with([
                    'flash-type' => 'sweetalert',
                    'case' => 'default',
                    'position' => 'center',
                    'type' => 'success',
                    'message' => 'Status Pembayaran Berhasil Diubah!'
                ]);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
