<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Repositories\NewsRepository;
use App\Repositories\ClassRepository;
use App\Repositories\MuridRepository;
use App\Repositories\PaymentRepository;
use Yajra\DataTables\Facades\DataTables;

class YajraDatatablesController extends Controller
{
    protected $news, $payment, $class, $murid;

    public function __construct(NewsRepository $newsRepository, PaymentRepository $paymentRepository, ClassRepository $classRepository, MuridRepository $muridRepository)
    {
        $this->news = $newsRepository;
        $this->payment = $paymentRepository;
        $this->class = $classRepository;
        $this->murid = $muridRepository;
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
        ->addColumn('date', function ($model) {
            return view('components.data-ajax.yajra-column.data-admin-payment.date-column', compact('model'))->render();
        })
        ->addColumn('status', function ($model) {
            return view('components.data-ajax.yajra-column.data-admin-payment.status-column', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('components.data-ajax.yajra-column.data-admin-payment.action-column', compact('model'))->render();
        })
        ->rawColumns(['index', 'name', 'date', 'status', 'action'])
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
}
