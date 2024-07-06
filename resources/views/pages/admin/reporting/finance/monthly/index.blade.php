@extends('layouts.main')

@section('title')
    Rekap - Keuangan Bulanan - Admin
@endsection

@section('section-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
      <div class="card-header border-bottom">
        <h5 class="card-title mb-3">Rekap Keuangan Bulanan</h5>
      </div>
      <div class="card-datatable table-responsive">
        <table class="table border-top" id="listAdminReportingFinanceMonthlyTable">
          <thead>
            <tr>
              <th></th>
              <th class="text-center"></th>
              <th class="text-center">Bulan</th>
              <th class="text-center">Jumlah Pembayaran</th>
              <th class="text-center">Total Nominal</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
</div>
@endsection