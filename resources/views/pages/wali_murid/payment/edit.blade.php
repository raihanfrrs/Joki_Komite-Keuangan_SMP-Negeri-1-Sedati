@extends('layouts.main')

@section('title')
    Ubah Pembayaran - Wali Murid
@endsection

@section('section-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Ubah Pembayaran</h5>
            </div>
            <div class="card-body">
            <form method="POST" action="{{ route('wali.murid.payment.update', $payment->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="name">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama Lengkap" required value="{{ old('name', $payment->name) }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="necessity">Keperluan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('necessity') is-invalid @enderror" id="necessity" name="necessity" placeholder="Keperluan" required value="{{ old('necessity', $payment->necessity) }}">
                        @error('necessity')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="date">Tanggal</label>
                    <div class="col-sm-10">
                        <input type="date" id="date" name="date" class="form-control @error('date') is-invalid @enderror" name="date" required value="{{ old('date', $payment->date) }}">
                        @error('date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="nominal">Nominal</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('nominal') is-invalid @enderror" id="nominal" name="nominal" placeholder="Nominal" required value="{{ old('nominal', $payment->nominal) }}">
                        @error('nominal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="payment_files">Bukti Pembayaran</label>
                    <div class="col-sm-10">
                        <input type="file" name="payment_files" id="payment_files" class="form-control" >
                        @if ($payment->getMedia('payment_files'))
                            <input type="hidden" name="old_media_uuid[]" value="{{ $payment->getMedia('payment_files')[0]->uuid }}">
                            <iframe src="{{ $payment->getFirstMediaUrl('payment_files') }}" frameborder="0" class="w-100 mt-2 responsive" style="height: 500px"></iframe>
                        @endif
                    </div>
                </div>
                <div class="row mt-3">
                <div class="d-flex justify-content-center col-sm-12">
                    <button type="submit" class="btn btn-primary waves-effect waves-light rounded me-4">Kirim</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light rounded">Batal</button>
                </div>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection