@extends('layouts.main')

@section('title')
  Masuk - Admin
@endsection

@section('section-authentication')
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
            <div class="card">
                <div class="card-body">
                    <div class="app-brand justify-content-center mb-4 mt-2">
                        <a href="/" class="app-brand-link gap-2">
                            <img src="{{ asset('assets/img/branding/brand-smp-negeri-sedati.png') }}" alt="">
                        </a>
                    </div>

                    <h4 class="mb-1 pt-2">Selamat Datang Admin!</h4>
                    <p class="mb-4">Silakan masuk ke akun Anda.</p>
                
                    <form id="formAuthentication" class="mb-3 fv-plugins-bootstrap5 fv-plugins-framework" action="{{ route('login.store', 'admin') }}" method="POST">
                        @csrf
                        <div class="mb-3 fv-plugins-icon-container">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" autofocus="">
                            @error('username')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 form-password-toggle fv-plugins-icon-container">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Kata Sandi</label>
                            </div>
                            <div class="input-group input-group-merge has-validation">
                                <input type="password" id="password" class="form-control" name="password" placeholder="············">
                                <span class="input-group-text cursor-pointer">
                                    <i class="ti ti-eye-off"></i>
                                </span>
                            </div>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100 waves-effect waves-light" type="submit">Masuk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection