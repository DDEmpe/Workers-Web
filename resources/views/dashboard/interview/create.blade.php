@extends('landing.layouts.mains')
@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create Interview </h1>
</div>

<div class="col-lg-8">
    <form action="/dashboard/interview" method="post" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="job_vacancy_id" class="form-label">Lowongan</label>
            <select class="form-select @error('job_vacancy_id') is-invalid @enderror" name="job_vacancy_id">
                <option value="">Pilih Lowongan</option>
                @foreach ($collection as $item)
                <option value="{{$item->id}}"> {{$item->branch}} </option>
                @endforeach
            </select>
            @error('job_vacancy_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="interview_date" class="form-label">Jadwal Interview</label>
            <input type="date" class="form-control @error('interview_date') is-invalid @enderror" id="interview_date" name="interview_date"
                value="#">
            @error('interview_date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="kategori_id" class="form-label">Tipe Interview</label>
            <select class="form-select @error('kategori_id') is-invalid @enderror" name="kategori_id">
                <option value="">Tipe Interview</option>
                <option value="0">Interview Langsung</option>
                <option value="1">Interview Online</option>
            </select>
            @error('kategori_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Lokasi Wawancara</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address"
                placeholder="Masukkan lokasi Interview">
            @error('address')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="notes" class="form-label">Catatan</label>
            <input type="textarea" class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes"
                placeholder="Contoh : Berpakaian rapih">
            @error('notes')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>

@endsection