@extends('layouts.main')

@section('title')
    Review Pembayaran - Admin
@endsection

@section('section-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Review Pembayaran</h5>
            </div>
            <div class="card-body">
            <form>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label fw-bold" for="basic-default-name">Nama</label>
                    <div class="col-sm-10">
                        {{ $payment->name }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label fw-bold" for="basic-default-company">Keperluan</label>
                    <div class="col-sm-10">
                        {{ $payment->necessity  }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label fw-bold" for="basic-default-phone">Tanggal</label>
                    <div class="col-sm-10">
                        {{ $payment->date }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label fw-bold" for="basic-default-phone">Nominal</label>
                    <div class="col-sm-10">
                        @rupiah($payment->nominal)
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label fw-bold" for="basic-default-message">Bukti Pembayaran</label>
                    <div class="col-sm-10">
                        <span class="text-primary">Bukti Pembayaran.jpg</span>
                    </div>
                </div>
                <div class="row mt-3">
                <div class="d-flex justify-content-center col-sm-12">
                    <button type="submit" class="btn btn-primary waves-effect waves-light rounded me-4">Setujui</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light rounded">Tolak</button>
                </div>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection