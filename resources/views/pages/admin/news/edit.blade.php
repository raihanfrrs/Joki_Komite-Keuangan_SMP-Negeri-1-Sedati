@extends('layouts.main')

@section('title')
    Ubah Berita - Admin
@endsection

@section('section-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Ubah Berita</h5>
            </div>
            <div class="card-body">
            <form method="POST" action="{{ route('admin.news.update', $news->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="title">Judul Berita</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $news->title) }}" id="title" name="title" placeholder="Judul Berita" required>
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
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror" placeholder="Tuliskan Deskripsi Singkat">{{ old('description', $news->description) }}</textarea>
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
                        <input type="date" id="date" name="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date', $news->date) }}" required>
                        @error('date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="radio" id="published" name="status" {{ old('status', $news->status) == 'published' ? 'checked' : '' }} value="published">
                            <label class="form-check-label" for="published">Published</label>
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="radio" id="draft" name="status" {{ old('status', $news->status) == 'draft' ? 'checked' : '' }} value="draft">
                            <label class="form-check-label" for="draft">Unpublished</label>
                        </div>
                    </div>
                </div>

                @php
                    $mediaUrls = [];
                    $mediaUuid = [];
                    $mediaCollection = $news->getMedia('news_files');

                    foreach ($mediaCollection as $media) {
                        $mediaUrls[] = $media->getUrl();
                        $mediaUuid[] = $media->uuid;
                    }
                @endphp

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="news_files">Lampiran Berita</label>
                    <div class="col-sm-10">
                        <input type="file" name="news_files[]" id="news_files" class="form-control @error('news_files') is-invalid @enderror" multiple onchange="previewFileNews()">
                    </div>
                </div>

                <div class="row mb-3 d-none" id="div-file-preview">
                    <label class="col-sm-2 col-form-label" for="news_files">Lampiran Berita Baru</label>
                    <div class="col-sm-10">
                        <div id="file-preview-container"></div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="news_files">Lampiran Berita Saat Ini <span class="text-danger"><sup>*Akan Ditimpa Jika Ada Perubahan</sup></span></label>
                    <div class="col-sm-10">
                        @if ($mediaCollection->isNotEmpty())
                            @foreach ($mediaCollection as $media)
                                <input type="hidden" name="old_media_uuid[]" value="{{ $media->uuid }}">
                                <iframe src="{{ $media->getUrl() }}" frameborder="0" class="w-100 mt-2 responsive" style="height: 300px"></iframe>
                            @endforeach
                        @endif
                        @error('news_files')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                <div class="d-flex justify-content-center col-sm-12">
                    <button type="submit" class="btn btn-primary waves-effect waves-light rounded me-4">Kirim</button>
                    <button type="reset" class="btn btn-primary waves-effect waves-light rounded">Batal</button>
                </div>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection