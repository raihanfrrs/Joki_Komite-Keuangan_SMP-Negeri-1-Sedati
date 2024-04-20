<?php

namespace App\Http\Controllers;

use App\Repositories\ClassRepository;
use Illuminate\Http\Request;
use App\Repositories\NewsRepository;
use App\Repositories\PaymentRepository;
use Yajra\DataTables\Facades\DataTables;

class YajraDatatablesController extends Controller
{
    protected $news, $payment, $class;

    public function __construct(NewsRepository $newsRepository, PaymentRepository $paymentRepository, ClassRepository $classRepository)
    {
        $this->news = $newsRepository;
        $this->payment = $paymentRepository;
        $this->class = $classRepository;
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
        ->addColumn('action', function ($model) {
            return view('components.data-ajax.yajra-column.data-admin-payment.action-column', compact('model'))->render();
        })
        ->rawColumns(['index', 'name', 'date', 'action'])
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
}
