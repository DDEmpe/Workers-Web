@extends('landing.layouts.mains')
@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Interview </h1>
</div>

<div class="col-lg-8">
    <form action="/dashboard/interview/{{ $id }}" method="post" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
        @foreach ($collection as $item)   
        @endforeach
        <div class="mb-3">
            <label for="job_vacancy" class="form-label">Lowongan</label>
            <select class="form-select" name="job_vacancy_id">
                @foreach ($jobvacancies as $jobvacancy)
                <option value="{{old('id',$jobvacancy->id)}}">{{old('branch',$jobvacancy->branch)}} </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="interview_date" class="form-label">Jadwal Interview</label>
            <input type="date" class="form-control @error('interview_date') is-invalid @enderror" id="interview_date" name="interview_date" required
                value="{{old('interview_date',$item->interview_date)}}">
            @error('interview_date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="kategori" class="form-label">Tipe Interview</label>
            <select class="form-select" name="kategori_id">
                <option value="0" selected>Interview Langsung</option>
                <option value="1" selected>Interview Online</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Lokasi Wawancara</label>
            <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" required
                placeholder="Masukkan lokasi Interview">{{old('address',$item->address)}}</textarea>
            @error('address')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="notes" class="form-label">Catatan</label>
            <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes"
                placeholder="Contoh : Berpakaian rapih">{{old('notes',$item->notes)}}</textarea>
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
