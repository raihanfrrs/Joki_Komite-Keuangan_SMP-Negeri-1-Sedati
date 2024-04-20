@extends('layouts.main')

@section('title')
    Pengaturan - Admin
@endsection

@section('section-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <h5 class="card-header">Pengaturan</h5>
        <!-- Account -->
        <div class="card-body">
          <div class="d-flex align-items-start align-items-sm-center gap-4">
            <img src="../../assets/img/avatars/14.png" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar">
            <div class="button-wrapper">
              <label for="upload" class="btn btn-primary me-2 mb-3 waves-effect waves-light" tabindex="0">
                <span class="d-none d-sm-block">Unggah Foto Baru</span>
                <i class="ti ti-upload d-block d-sm-none"></i>
                <input type="file" id="upload" class="account-file-input" hidden="" accept="image/png, image/jpeg">
              </label>
              <button type="button" class="btn btn-label-secondary account-image-reset mb-3 waves-effect">
                <i class="ti ti-refresh-dot d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Ulangi</span>
              </button>
            </div>
          </div>
        </div>
        <hr class="my-0">
        <div class="card-body">
          <form id="formAccountSettings" method="POST" onsubmit="return false" class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
            <div class="row">
                <div class="mb-3 col-md-6 fv-plugins-icon-container">
                    <label for="firstName" class="form-label">Nama Lengkap</label>
                    <input class="form-control" type="text" id="firstName" name="firstName" value="{{ auth()->user()->admin->name }}" autofocus="" placeholder="Nama Lengkap">
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>

                <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">Alamat Surel</label>
                    <input class="form-control" type="email" id="email" name="email" value="{{ auth()->user()->admin->email }}" placeholder="y6DpX@gmail.com">
                </div>

                <div class="mb-3 col-md-6">
                    <label for="organization" class="form-label">Kata Sandi</label>
                    <input type="password" class="form-control" id="organization" name="organization" placeholder="••••••••">
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label" for="phoneNumber">Nomor Ponsel</label>
                    <div class="input-group input-group-merge">
                        <input type="text" id="phoneNumber" name="phoneNumber" class="form-control" placeholder="0823-XXXX-XXXX">
                    </div>
                </div>
            </div>
            <div class="mt-2 d-flex justify-content-center">
              <button type="submit" class="btn btn-primary me-2 waves-effect waves-light">Ubah</button>
              <button type="reset" class="btn btn-label-secondary waves-effect">Batal</button>
            </div>
          <input type="hidden"></form>
        </div>
        <!-- /Account -->
    </div>
</div>
@endsection