<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Repositories\NewsRepository;
use App\Repositories\ClassRepository;
use App\Repositories\MuridRepository;
use App\Repositories\PaymentRepository;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\WaliMuridRepository;

class YajraDatatablesController extends Controller
{
    protected $news, $payment, $class, $murid, $walimurid;

    public function __construct(NewsRepository $newsRepository, PaymentRepository $paymentRepository, ClassRepository $classRepository, MuridRepository $muridRepository, WaliMuridRepository $waliMuridRepository)
    {
        $this->news = $newsRepository;
        $this->payment = $paymentRepository;
        $this->class = $classRepository;
        $this->murid = $muridRepository;
        $this->walimurid = $waliMuridRepository;
    }

    public function admin_news()
    {
        $news = $this->news->getAllNews();

        return DataTables::of($news)
        ->addColumn('title', function ($model) {
            return view('components.data-ajax.yajra-column.data-admin-news.title-column', compact('model'))->render();
        })
        ->addColumn('date', function ($model) {
            return view('components.data-ajax.yajra-column.data-admin-news.date-column', compact('model'))->render();
        })
        ->addColumn('status', function ($model) {
            return view('components.data-ajax.yajra-column.data-admin-news.status-column', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('components.data-ajax.yajra-column.data-admin-news.action-column', compact('model'))->render();
        })
        ->rawColumns(['title', 'date', 'status', 'action'])
        ->make(true);
    }

    public function admin_payment()
    {
        $payments = $this->payment->getAllPayments();

        return DataTables::of($payments)
        ->addColumn('index', function ($model) use ($payments) {
            return $payments->search($model) + 1;
        })
        ->addColumn('name', function ($model) {
            return view('components.data-ajax.yajra-column.data-admin-payment.name-column', compact('model'))->render();
        })
        ->addColumn('kelas', function ($model) {
            return view('components.data-ajax.yajra-column.data-admin-payment.kelas-column', compact('model'))->render();
        })
        ->addColumn('date', function ($model) {
            return view('components.data-ajax.yajra-column.data-admin-payment.date-column', compact('model'))->render();
        })
        ->addColumn('status', function ($model) {
            return view('components.data-ajax.yajra-column.data-admin-payment.status-column', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('components.data-ajax.yajra-column.data-admin-payment.action-column', compact('model'))->render();
        })
        ->rawColumns(['index', 'name', 'kelas', 'date', 'status', 'action'])
        ->make(true);
    }

    public function admin_class()
    {
        $class = $this->class->getAllClasses();

        return DataTables::of($class)
        ->addColumn('name', function ($model) {
            return view('components.data-ajax.yajra-column.data-admin-class.name-column', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('components.data-ajax.yajra-column.data-admin-class.action-column', compact('model'))->render();
        })
        ->rawColumns(['index', 'action'])
        ->make(true);
    }

    public function wali_murid_news()
    {
        $news = $this->news->getAllNewsWithPulishedStatus();

        return DataTables::of($news)
        ->addColumn('title', function ($model) {
            return view('components.data-ajax.yajra-column.data-wali-murid-news.title-column', compact('model'))->render();
        })
        ->addColumn('date', function ($model) {
            return view('components.data-ajax.yajra-column.data-wali-murid-news.date-column', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('components.data-ajax.yajra-column.data-wali-murid-news.action-column', compact('model'))->render();
        })
        ->rawColumns(['title', 'date', 'action'])
        ->make(true);
    }
    
    public function wali_murid_payment()
    {
        $payments = $this->payment->getAllPaymentsByWaliMurid();

        return DataTables::of($payments)
        ->addColumn('index', function ($model) use ($payments) {
            return $payments->search($model) + 1;
        })
        ->addColumn('necessity', function ($model) {
            return view('components.data-ajax.yajra-column.data-wali-murid-payment.necessity-column', compact('model'))->render();
        })
        ->addColumn('date', function ($model) {
            return view('components.data-ajax.yajra-column.data-wali-murid-payment.date-column', compact('model'))->render();
        })
        ->addColumn('nominal', function ($model) {
            return view('components.data-ajax.yajra-column.data-wali-murid-payment.nominal-column', compact('model'))->render();
        })
        ->addColumn('status', function ($model) {
            return view('components.data-ajax.yajra-column.data-wali-murid-payment.status-column', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('components.data-ajax.yajra-column.data-wali-murid-payment.action-column', compact('model'))->render();
        })
        ->rawColumns(['index', 'necessity', 'date', 'nominal', 'status', 'action'])
        ->make(true);
    }

    public function wali_murid_all_murid()
    {
        $murids = $this->murid->getAllMuridByWaliMurid();

        return DataTables::of($murids)
        ->addColumn('index', function ($model) use ($murids) {
            return $murids->search($model) + 1;
        })
        ->addColumn('murid', function ($model) {
            return view('components.data-ajax.yajra-column.data-wali-murid-all-murid.murid-column', compact('model'))->render();
        })
        ->addColumn('wali_murid', function ($model) {
            return view('components.data-ajax.yajra-column.data-wali-murid-all-murid.wali-murid-column', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('components.data-ajax.yajra-column.data-wali-murid-all-murid.action-column', compact('model'))->render();
        })
        ->rawColumns(['index', 'murid', 'wali_murid', 'action'])
        ->make(true);
    }

    public function admin_all_murid(Kelas $class)
    {
        $murids = $this->murid->getAllMuridByClass($class);

        return DataTables::of($murids)
        ->addColumn('index', function ($model) use ($murids) {
            return $murids->search($model) + 1;
        })
        ->addColumn('murid', function ($model) {
            return view('components.data-ajax.yajra-column.data-admin-all-murid.murid-column', compact('model'))->render();
        })
        ->addColumn('wali_murid', function ($model) {
            return view('components.data-ajax.yajra-column.data-admin-all-murid.wali-murid-column', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('components.data-ajax.yajra-column.data-admin-all-murid.action-column', compact('model'))->render();
        })
        ->rawColumns(['index', 'murid', 'wali_murid', 'action'])
        ->make(true);
    }

    public function admin_all_wali_murid()
    {
        $waliMurids = $this->walimurid->getAllWaliMurid();

        return DataTables::of($waliMurids)
        ->addColumn('index', function ($model) use ($waliMurids) {
            return $waliMurids->search($model) + 1;
        })
        ->addColumn('username', function ($model) {
            return view('components.data-ajax.yajra-column.data-admin-all-wali-murid.username-column', compact('model'))->render();
        })
        ->addColumn('kelas', function ($model) {
            return view('components.data-ajax.yajra-column.data-admin-all-wali-murid.kelas-column', compact('model'))->render();
        })
        ->addColumn('name', function ($model) {
            return view('components.data-ajax.yajra-column.data-admin-all-wali-murid.name-column', compact('model'))->render();
        })
        ->addColumn('phone', function ($model) {
            return view('components.data-ajax.yajra-column.data-admin-all-wali-murid.phone-column', compact('model'))->render();
        })
        ->addColumn('email', function ($model) {
            return view('components.data-ajax.yajra-column.data-admin-all-wali-murid.email-column', compact('model'))->render();
        })
        ->addColumn('created_at', function ($model) {
            return view('components.data-ajax.yajra-column.data-admin-all-wali-murid.registered-at-column', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('components.data-ajax.yajra-column.data-admin-all-wali-murid.action-column', compact('model'))->render();
        })
        ->rawColumns(['index', 'username', 'kelas', 'name', 'phone', 'email', 'created_at', 'action'])
        ->make(true);
    }

    public function admin_reporting_finance_yearly()
    {
        $payments = $this->payment->getAllPaymentsGroupByPeriodically('year');

        return DataTables::of($payments)
        ->addColumn('index', function ($model) use ($payments) {
            return $payments->search($model) + 1;
        })
        ->addColumn('year', function ($model) {
            return view('components.data-ajax.yajra-column.data-reporting-finance-yearly.year-column', compact('model'))->render();
        })
        ->addColumn('total_amount', function ($model) {
            return view('components.data-ajax.yajra-column.data-reporting-finance-yearly.total-amount-column', compact('model'))->render();
        })
        ->addColumn('total_nominal', function ($model) {
            return view('components.data-ajax.yajra-column.data-reporting-finance-yearly.total-nominal-column', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('components.data-ajax.yajra-column.data-reporting-finance-yearly.action-column', compact('model'))->render();
        })
        ->rawColumns(['index', 'year', 'total_amount', 'total_nominal', 'action'])
        ->make(true);
    }

    public function admin_reporting_finance_monthly()
    {
        $payments = $this->payment->getAllPaymentsGroupByPeriodically('month');

        return DataTables::of($payments)
        ->addColumn('index', function ($model) use ($payments) {
            return $payments->search($model) + 1;
        })
        ->addColumn('month', function ($model) {
            return view('components.data-ajax.yajra-column.data-reporting-finance-monthly.month-column', compact('model'))->render();
        })
        ->addColumn('total_amount', function ($model) {
            return view('components.data-ajax.yajra-column.data-reporting-finance-monthly.total-amount-column', compact('model'))->render();
        })
        ->addColumn('total_nominal', function ($model) {
            return view('components.data-ajax.yajra-column.data-reporting-finance-monthly.total-nominal-column', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('components.data-ajax.yajra-column.data-reporting-finance-monthly.action-column', compact('model'))->render();
        })
        ->rawColumns(['index', 'year', 'total_amount', 'total_nominal', 'action'])
        ->make(true);
    }

    public function admin_reporting_finance_daily()
    {
        $payments = $this->payment->getAllPaymentsGroupByPeriodically('day');

        return DataTables::of($payments)
        ->addColumn('index', function ($model) use ($payments) {
            return $payments->search($model) + 1;
        })
        ->addColumn('day', function ($model) {
            return view('components.data-ajax.yajra-column.data-reporting-finance-daily.day-column', compact('model'))->render();
        })
        ->addColumn('total_amount', function ($model) {
            return view('components.data-ajax.yajra-column.data-reporting-finance-daily.total-amount-column', compact('model'))->render();
        })
        ->addColumn('total_nominal', function ($model) {
            return view('components.data-ajax.yajra-column.data-reporting-finance-daily.total-nominal-column', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('components.data-ajax.yajra-column.data-reporting-finance-daily.action-column', compact('model'))->render();
        })
        ->rawColumns(['index', 'year', 'total_amount', 'total_nominal', 'action'])
        ->make(true);
    }
}
