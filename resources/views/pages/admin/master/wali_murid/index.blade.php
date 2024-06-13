@extends('layouts.main')

@section('title')
    Master - Wali Murid - Admin
@endsection

@section('section-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
      <div class="card-header border-bottom">
        <h5 class="card-title mb-3">Daftar Wali Murid</h5>
      </div>
      <div class="card-datatable table-responsive">
        <table class="table border-top" id="listAdminAllWaliMuridTable">
          <thead>
            <tr>
              <th></th>
              <th class="text-center">No</th>
              <th class="text-center">Username</th>
              <th class="text-center">Kelas</th>
              <th class="text-center">Wali Murid</th>
              <th class="text-center">Ponsel</th>
              <th class="text-center">Surel</th>
              <th class="text-center">Tgl. Dibuat</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
</div>
@endsection