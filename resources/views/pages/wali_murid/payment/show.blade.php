@extends('layouts.main')

@section('title')
    Rincian Pembayaran - Wali Murid
@endsection

@section('section-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Rincian Pembayaran</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ $payment->name }}" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Keperluan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ $payment->necessity }}" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" value="{{ $payment->date }}" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Nominal</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ $payment->nominal}}" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Bukti Pembayaran</label>
                    <div class="col-sm-10">
                        @if ($payment->getMedia('payment_files'))
                            <iframe src="{{ $payment->getFirstMediaUrl('payment_files') }}" frameborder="0" class="w-100 mt-2 responsive" style="height: 500px"></iframe>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection