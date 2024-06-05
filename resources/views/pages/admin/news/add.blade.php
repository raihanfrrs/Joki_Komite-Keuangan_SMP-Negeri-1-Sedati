@extends('layouts.main')

@section('title')
    Tambah Berita - Admin
@endsection

@section('section-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Tambah Berita</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="title">Judul Berita</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" id="title" name="title" placeholder="Judul Berita" required>
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="description">Narasi <span class="text-danger"><sup>*Optional</sup></span></label>
                        <div class="col-sm-10">
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror" placeholder="Tuliskan Deskripsi Singkat">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="date">Tanggal Terbit</label>
                        <div class="col-sm-10">
                            <input type="date" id="date" name="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date', date('Y-m-d')) }}" required>
                            @error('date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="news_files">Lampiran Berita</label>
                        <div class="col-sm-10">
                            <input type="file" name="news_files[]" id="news_files" class="form-control @error('news_files') is-invalid @enderror" required multiple onchange="previewFileNews()">
                            @error('news_files')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3 d-none" id="div-file-preview">
                        <label class="col-sm-2 col-form-label" for="news_files">Lampiran Berita Baru</label>
                        <div class="col-sm-10">
                            <div id="file-preview-container"></div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="d-flex justify-content-center col-sm-12">
                            <button type="submit" class="btn btn-primary waves-effect waves-light rounded me-4">Kirim</button>
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