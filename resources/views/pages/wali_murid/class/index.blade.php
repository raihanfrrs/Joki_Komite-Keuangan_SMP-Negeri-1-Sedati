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
            <span style="float: right" class="fw-bold">Kelas 2.1</span>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                      <thead>
                        <tr class="text-nowrap">
                          <th class="text-center">No</th>
                          <th class="text-center">Nama Murid</th>
                          <th class="text-center">Nama Wali Murid</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row" class="text-center">1</th>
                          <td class="text-center">Althaaf Saifullah</td>
                          <td class="text-center">Puguh Putra Irawan</td>
                        </tr>
                        <tr>
                          <th scope="row" class="text-center">2</th>
                          <td class="text-center">Rizky Dwi Rachman</td>
                          <td class="text-center">Rizal Pamuja</td>
                        </tr>
                        <tr>
                          <th scope="row" class="text-center">3</th>
                          <td class="text-center">Ainur Lintang</td>
                          <td class="text-center">Rizal Pamuja</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection