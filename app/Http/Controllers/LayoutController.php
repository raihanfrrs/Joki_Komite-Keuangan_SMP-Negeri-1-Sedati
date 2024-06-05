<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\NewsRepository;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ClassRepository;
use App\Repositories\MuridRepository;
use App\Repositories\PaymentRepository;

class LayoutController extends Controller
{
    protected $news, $payment, $class, $murid;

    public function __construct(NewsRepository $newsRepository, PaymentRepository $paymentRepository, ClassRepository $classRepository, MuridRepository $muridRepository)
    {
        $this->news = $newsRepository;
        $this->payment = $paymentRepository;
        $this->class = $classRepository;
        $this->murid = $muridRepository;
    }

    public function index()
    {
        if (Auth::check()) {
            $this->news->updateStatusAllNews();
        }

        if (Auth::check() && auth()->user()->level == 'admin') {
            return view('pages.admin.dashboard.index', [
                'news' => $this->news->getAllNewsByLimit(4),
                'payment' => $this->payment->getAllPaymentsByApproveStatus(),
                'totalPaymentThisMonth' => $this->payment->getTotalPaymentThisMonth('approve'),
                'totalNewsThisMonth' => $this->news->getTotalNewsThisMonth(),
                'totalClass' => $this->class->getAllClasses()->count(),
                'totalStudent' => $this->murid->getAllMurid()->count(),
            ]);
        } elseif (Auth::check() && auth()->user()->level == 'wali murid') {
            return view('pages.wali_murid.dashboard.index', [
                'payment' => $this->payment->getAllPaymentsByApproveStatus()->where('wali_murid_id', auth()->user()->wali_murid->id),
                'totalPaymentThisMonth' => $this->payment->getTotalPaymentThisMonth('approve')->where('wali_murid_id', auth()->user()->wali_murid->id),
                'totalPaymentApprovedThisMonth' => $this->payment->getTotalPaymentThisMonth('approve')->where('wali_murid_id', auth()->user()->wali_murid->id)->count(),
                'totalPaymentDeclinedThisMonth' => $this->payment->getTotalPaymentThisMonth('decline')->where('wali_murid_id', auth()->user()->wali_murid->id)->count(),
                'totalStudent' => $this->murid->getAllMuridByWaliMurid()->count(),
            ]);
        } else {
            return redirect()->route('login.wali.murid');
        }
    }
}
