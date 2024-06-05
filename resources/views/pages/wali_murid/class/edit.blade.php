@extends('layouts.main')

@section('title')
    Ubah Murid - Wali Murid
@endsection

@section('section-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Ubah Murid</h5>
            </div>
            <div class="card-body">
            <form method="POST" action="{{ route('wali.murid.class.update', $murid->id) }}">
                @csrf
                @method('PATCH')
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="name">Murid</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $murid->name) }}" id="name" name="name" placeholder="Nama Murid" required>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="wali_murid">Wali Murid</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('wali_murid') is-invalid @enderror" value="{{ old('wali_murid', $murid->wali_murid) }}" id="wali_murid" name="wali_murid" placeholder="Nama Wali Murid" required>
                        @error('wali_murid')
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