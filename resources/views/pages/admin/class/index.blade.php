@extends('layouts.main')

@section('title')
    Kelas - Admin
@endsection

@section('section-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
      <div class="card-header border-bottom">
        <h5 class="card-title mb-3">Daftar Kelas</h5>
      </div>
      <div class="card-datatable table-responsive">
        <table class="table border-top" id="listAdminClassTable">
          <thead>
            <tr>
              <th></th>
              <th class="text-center">Nama</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
</div>
@endsection