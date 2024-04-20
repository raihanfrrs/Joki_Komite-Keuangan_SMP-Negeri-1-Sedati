<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class AdminPaymentController extends Controller
{
    public function admin_payment_index()
    {
        return view('pages.admin.payment.index');
    }

    public function admin_payment_show(Payment $payment)
    {
        return view('pages.admin.payment.show', compact('payment'));
    }
}
