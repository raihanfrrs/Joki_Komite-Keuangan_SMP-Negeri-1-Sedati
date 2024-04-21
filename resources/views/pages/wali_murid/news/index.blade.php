@extends('layouts.main')

@section('title')
    Berita - Wali Murid
@endsection

@section('section-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
      <div class="card-header border-bottom">
        <h5 class="card-title mb-3">Berita</h5>
      </div>
      <div class="card-datatable table-responsive">
        <table class="table border-top" id="listWaliMuridNewsTable">
          <thead>
            <tr>
              <th></th>
              <th class="text-center">Judul Berita</th>
              <th class="text-center">Tanggal</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
</div>
@endsection