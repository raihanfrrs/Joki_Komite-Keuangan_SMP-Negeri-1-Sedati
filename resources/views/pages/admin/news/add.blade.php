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
            <form>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Judul Berita</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="basic-default-name" placeholder="Judul Berita">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-company">Narasi</label>
                    <div class="col-sm-10">
                        <textarea name="" id="" cols="30" rows="10" class="form-control" placeholder="Tuliskan Deskripsi Singkat"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-phone">Tanggal Terbit</label>
                    <div class="col-sm-10">
                        <input type="date" id="basic-default-phone" class="form-control phone-mask">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-message">Lampiran Berita</label>
                    <div class="col-sm-10">
                        <input type="file" name="" id="" class="form-control">
                    </div>
                </div>
                <div class="row mt-3">
                <div class="d-flex justify-content-center col-sm-12">
                    <button type="submit" class="btn btn-primary waves-effect waves-light rounded me-4">Submit</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light rounded">Cancel</button>
                </div>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection