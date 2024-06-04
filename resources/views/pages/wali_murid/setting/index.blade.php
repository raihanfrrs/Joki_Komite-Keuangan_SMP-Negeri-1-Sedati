@extends('layouts.main')

@section('title')
    Pengaturan - Wali Murid
@endsection

@section('section-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <h5 class="card-header">Pengaturan</h5>
        <!-- Account -->
        <div class="card-body">
          <div class="d-flex align-items-start align-items-sm-center gap-4">
            <img src="{{ auth()->user()->wali_murid->getFirstMediaUrl('wali_murid_images') ? auth()->user()->wali_murid->getFirstMediaUrl('wali_murid_images') : asset('assets/img/avatars/14.png') }}" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded img-preview" id="uploadedAvatar">
            <div class="button-wrapper">
              <label for="settingImage" class="btn btn-primary me-2 mb-3 waves-effect waves-light" tabindex="0">
                <span class="d-none d-sm-block">Unggah Foto Baru</span>
                <i class="ti ti-upload d-block d-sm-none"></i>
              </label>
            </div>
          </div>
          @error('wali_murid_images')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <hr class="my-0">
        <div class="card-body">
          <form action="{{ route('wali.murid.setting.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <input type="file" id="settingImage" name="wali_murid_images" class="account-file-input" hidden="" accept="image/png, image/jpeg" onchange="previewImage()">
            <input type="hidden" name="old_media_uuid" value="{{ auth()->user()->wali_murid->getMedia('wali_murid_images')[0]->uuid ?? '' }}">
            <div class="row">
                <div class="mb-3 col-md-6 fv-plugins-icon-container">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{ old('name', auth()->user()->wali_murid->name) }}" placeholder="Nama Lengkap" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">Alamat Surel</label>
                    <input class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email" value="{{ old('email', auth()->user()->wali_murid->email) }}" placeholder="y6DpX@gmail.com" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <label for="organization" class="form-label">Kata Sandi</label>
                    <input type="password" class="form-control" id="organization" name="organization" placeholder="••••••••">
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label" for="phone">Nomor Ponsel</label>
                    <div class="input-group input-group-merge">
                        <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', auth()->user()->wali_murid->phone) }}" required>
                    </div>
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mt-2 d-flex justify-content-center">
              <button type="submit" class="btn btn-primary me-2 waves-effect waves-light">Ubah</button>
              <button type="reset" class="btn btn-label-secondary waves-effect">Batal</button>
            </div>
          </form>
        </div>
        <!-- /Account -->
    </div>
</div>
@endsection