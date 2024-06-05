@extends('layouts.main')

@section('title')
    Kelas - Wali Murid
@endsection

@section('section-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Detail Kelas</h5>
            <span style="float: right" class="fw-bold">
              {{ auth()->user()->wali_murid->kelas->name }}
            </span>
            </div>
            <div class="card-body">
              <div class="table-responsive text-nowrap">
                  <table class="table border-top" id="listWaliMuridAllMuridTable">
                    <thead>
                      <tr>
                        <th></th>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Murid</th>
                        <th class="text-center">Nama Wali Murid</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                  </table>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection