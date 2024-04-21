<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WaliMuridPaymentController extends Controller
{
    public function wali_murid_payment_index()
    {
        return view('pages.wali_murid.payment.index');
    }

    public function wali_murid_payment_create()
    {
        return view('pages.wali_murid.payment.add');
    }
}
