<?php

namespace App\Repositories;

use App\Models\Payment;

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
}