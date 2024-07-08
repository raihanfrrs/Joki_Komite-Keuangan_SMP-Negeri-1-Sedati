<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PaymentRepository;

class AdminReportingController extends Controller
{
    protected $payment;

    public function __construct(PaymentRepository $paymentRepository)
    {
        $this->payment = $paymentRepository;
    }

    public function admin_reporting_finance_yearly()
    {
        return view('pages.admin.reporting.finance.yearly.index');
    }

    public function admin_reporting_finance_yearly_print($year)
    {
        $payments = $this->payment->getAllPaymentsByYear($year);

        return view('pages.admin.reporting.finance.yearly.print', compact('payments', 'year'));
    }

    public function admin_reporting_finance_monthly()
    {
        return view('pages.admin.reporting.finance.monthly.index');
    }

    public function admin_reporting_finance_monthly_print($month)
    {
        $payments = $this->payment->getAllPaymentsByMonth($month);

        return view('pages.admin.reporting.finance.monthly.print', compact('payments', 'month'));
    }

    public function admin_reporting_finance_daily()
    {
        return view('pages.admin.reporting.finance.daily.index');
    }

    public function admin_reporting_finance_daily_print($day)
    {
        $payments = $this->payment->getAllPaymentsByDay($day);

        return view('pages.admin.reporting.finance.daily.print', compact('payments', 'day'));
    }
}
