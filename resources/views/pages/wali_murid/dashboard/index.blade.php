@extends('layouts.main')

@section('title')
    Dashboard - Wali Murid
@endsection

@section('section-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xl-12 mb-4 col-12">
            <div class="card h-100">
              <div class="card-header">
                <div class="d-flex justify-content-between mb-3">
                  <h5 class="card-title mb-0">Analitik</h5>
                  {{-- <small class="text-muted">Updated 1 month ago</small> --}}
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
                        <h5 class="mb-0">@rupiah(2000000)</h5>
                        <small>Uang Masuk Bulan Januari</small>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 col-6">
                    <div class="d-flex align-items-center">
                      <div class="badge rounded-pill bg-label-danger me-3 p-2">
                        <i class="ti ti-wallet ti-sm"></i>
                      </div>
                      <div class="card-info">
                        <h5 class="mb-0">@rupiah(426000)</h5>
                        <small>Uang Keluar BUlan Januari</small>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 col-6">
                    <div class="d-flex align-items-center">
                      <div class="badge rounded-pill bg-label-primary me-3 p-2">
                        <i class="ti ti-wallet ti-sm"></i>
                      </div>
                      <div class="card-info">
                        <h5 class="mb-0">@rupiah(1574000)</h5>
                        <small>Sisa Uang</small>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 col-6">
                    <div class="d-flex align-items-center">
                      <div class="badge rounded-pill bg-label-info me-3 p-2">
                        <i class="ti ti-shopping-cart ti-sm"></i>
                      </div>
                      <div class="card-info">
                        <h5 class="mb-0">2</h5>
                        <small>Pembelian Barang Januari</small>
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