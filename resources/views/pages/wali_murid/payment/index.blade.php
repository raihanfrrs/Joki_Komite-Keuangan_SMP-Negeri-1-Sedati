@extends('layouts.main')

@section('title')
    Pembayaran - Wali Murid
@endsection

@section('section-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
      <div class="card-header border-bottom">
        <h5 class="card-title mb-3">Daftar Pembayaran</h5>
      </div>
      <div class="card-datatable table-responsive">
        <table class="table border-top" id="listWaliMuridPaymentTable">
          <thead>
            <tr>
              <th></th>
              <th class="text-center">No</th>
              <th class="text-center">Keperluan</th>
              <th class="text-center">Tanggal</th>
              <th class="text-center">Nominal</th>
              <th class="text-center">Status</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
</div>
@endsection