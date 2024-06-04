@extends('layouts.main')

@section('title')
    Rincian Berita - Wali Murid
@endsection

@section('section-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Rincian Berita</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Judul Berita</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ $news->title }}" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Narasi</label>
                    <div class="col-sm-10">
                        <textarea cols="30" rows="10" class="form-control" disabled>{{ $news->description }}</textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Tanggal Terbit</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" value="{{ $news->date }}" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="radio" {{ old('status', $news->status) == 'published' ? 'checked' : '' }} disabled>
                            <label class="form-check-label" for="published">Published</label>
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="radio" {{ old('status', $news->status) == 'draft' ? 'checked' : '' }} disabled>
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
                    <label class="col-sm-2 col-form-label">Lampiran Berita</label>
                    <div class="col-sm-10">
                        @if ($mediaCollection->isNotEmpty())
                            @foreach ($mediaCollection as $media)
                                <input type="hidden" name="old_media_uuid[]" value="{{ $media->uuid }}">
                                <iframe src="{{ $media->getUrl() }}" frameborder="0" class="w-100 mt-2 responsive" style="height: 300px"></iframe>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection