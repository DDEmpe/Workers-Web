@extends('landing.layouts.mains')
@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"> Interview </h1>
</div>

<div class="col-lg-8">
    <form action="#" method="post" class="mb-5" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="didirikan" class="form-label">Jadwal Interview</label>
            <input type="date" class="form-control @error('didirikan') is-invalid @enderror" id="didirikan" name="didirikan" required
                value="#">
            @error('didirikan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="kategori" class="form-label">Tipe Interview</label>
            <select class="form-select" name="kategori_id">
                <option value="#" selected>Interview Langsung</option>
                <option value="#" selected>Interview Online</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi Wawancara</label>
            <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi" required
                placeholder="Masukkan lokasi Interview">
            @error('lokasi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="catatan" class="form-label">Catatan</label>
            <input type="textarea" class="form-control @error('lokasi') is-invalid @enderror" id="catatan" name="catatan"
                placeholder="Contoh : Berpakaian rapih">
            @error('catatan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Post</button>
    </form>
</div>

@endsection