@extends('layouts.main')

@section('title')
    Master - Ubah Wali Murid - Admin
@endsection

@section('section-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Ubah Wali Murid</h5>
            </div>
            <div class="card-body">
            <form method="POST" action="{{ route('admin.master.wali-murid.update', $wali_murid->id) }}">
                @csrf
                @method('PATCH')
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="name">Wali Murid</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $wali_murid->name) }}" id="name" name="name" placeholder="Wali Murid" required>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="phone">Ponsel</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $wali_murid->phone) }}" id="phone" name="phone" placeholder="Nomor Ponsel" required>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="email">Alamat Surel</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $wali_murid->email) }}" id="email" name="email" placeholder="Alamat Surel" required>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="d-flex justify-content-center col-sm-12">
                        <button type="submit" class="btn btn-primary waves-effect waves-light rounded me-4">Ubah</button>
                        <button type="reset" class="btn btn-danger waves-effect waves-light rounded">Batal</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection