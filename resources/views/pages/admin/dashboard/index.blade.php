@extends('layouts.main')

@section('title')
    Dashboard - Admin
@endsection

@section('section-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-xl-12 mb-4 col-lg-12 col-12">
        <div class="card">
          <div class="d-flex align-items-end row">
            <div class="col-7">
              <div class="card-body text-nowrap">
                <h5 class="card-title mb-0 text-capitalize">Selamat Datang Kembali, {{ auth()->user()->level }}! 🎉</h5>
                <p class="mb-2">Total Seluruh Pembayaran Masuk</p>
                <h4 class="text-primary mb-1">@rupiah($payment->sum('nominal'))</h4>
                <a href="{{ route('admin.payment.index') }}" class="btn btn-primary waves-effect waves-light mt-4">Lihat Pembayaran</a>
              </div>
            </div>
            <div class="col-5 text-center text-sm-left">
              <div class="card-body pb-0 px-0 px-md-4">
                <img src="{{ asset('assets/img/illustrations/card-advance-sale.png') }}" height="140" alt="view sales">
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-12 mb-4 col-12">
          <div class="card h-100">
            <div class="card-header">
              <div class="d-flex justify-content-between mb-3">
                <h5 class="card-title mb-0">Analitik</h5>
              </div>
            </div>
            <div class="card-body">
              <div class="row gy-3">
                <div class="col-md-3 col-6">
                  <div class="d-flex align-items-center">
                    <div class="badge rounded-pill bg-label-success me-3 p-2">
                      <i class="ti ti-wallet ti-sm"></i>
                    </div>
                    <div class="card-info">
                      <h5 class="mb-0">@rupiah($totalPaymentThisMonth->sum('nominal'))</h5>
                      <small>Uang Masuk Bulan {{ \Carbon\Carbon::now()->translatedFormat('F') }}</small>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-6">
                  <div class="d-flex align-items-center">
                    <div class="badge rounded-pill bg-label-info me-3 p-2">
                      <i class="ti ti-news ti-sm"></i>
                    </div>
                    <div class="card-info">
                      <h5 class="mb-0">{{ $totalNewsThisMonth->count() }}</h5>
                      <small>Berita Publis Bulan Ini {{ \Carbon\Carbon::now()->translatedFormat('F') }}</small>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-6">
                  <div class="d-flex align-items-center">
                    <div class="badge rounded-pill bg-label-primary me-3 p-2">
                      <i class="ti ti-door ti-sm"></i>
                    </div>
                    <div class="card-info">
                      <h5 class="mb-0">{{ $totalClass }}</h5>
                      <small>Total Kelas</small>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-6">
                  <div class="d-flex align-items-center">
                    <div class="badge rounded-pill bg-label-success me-3 p-2">
                      <i class="ti ti-school ti-sm"></i>
                    </div>
                    <div class="card-info">
                      <h5 class="mb-0">{{ $totalStudent }}</h5>
                      <small>Total Murid</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
</div>
@endsection