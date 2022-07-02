@extends('Landing.Layouts.mains')

@section('container')
<div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"> Buat Lowongan </h1>
</div>

<div class="col-lg-8 ">
    <form action="/dashboard/lowongan" method="post" class="mb-5" >
        @csrf
        <div class="mb-3">
            <label for="branch" class="form-label">Nama Lowongan</label>
            <input type="text" class="form-control @error('branch') is-invalid @enderror" id="branch" name="branch" value="{{ old('branch') }}"
                autofocus >
            @error('branch')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <input type="hidden" name="interview" value="0">


        <div class="mb-3">
            <label for="location" class="form-label">Alamat</label>
            <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" 
            value="{{ old('location') }}" >
            @error('location')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="departement_id" class="form-label">Bidang</label>
            <select class="form-select @error('departement_id') is-invalid @enderror" name="departement_id">
                <option value="" selected>Pilih Bidang </option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->departement_name }}</option>
            @endforeach
            </select>
            @error('departement_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        </div>


        <div class="mb-3">
            <label for="job_type" class="form-label">Jenis Kerja</label>
            <select class="form-select @error('job_type') is-invalid @enderror" name="job_type">
                <option value="" selected>Pilih Jenis Kerja</option>
                <option value="Part-Time" >Part-Time</option>
                <option value="Full-Time" >Full-Time</option>
                <option value="Freelance" >Freelance</option>
            </select>
            @error('job_type')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        </div>

        <div class="mb-3">
            <label for="min_wages" class="form-label">Gaji Minimal</label>
            <input type="number" class="form-control @error('min_wages') is-invalid @enderror" id="min_wages" name="min_wages" value="{{ old('min_wages') }}" >
            @error('min_wages')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="max_wages" class="form-label">Gaji Maksimal</label>
            <input type="number" class="form-control @error('max_wages') is-invalid @enderror" id="max_wages" name="max_wages" value="{{ old('max_wages') }}" >
            @error('max_wages')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="last_education" class="form-label">Minimum Pendidikan</label>
            <select class="form-select @error('last_education') is-invalid @enderror" name="last_education">
                <option value=""> Minimum Pendidikan</option>
                <option value="Tidak Ada">Tidak Ada</option>
                <option value="SMP">SMP</option>
                <option value="SMA">SMA</option>
                <option value="SMK">SMK</option>
                <option value="D1">D1</option>
                <option value="D2">D2</option>
                <option value="D3">D3</option>
                <option value="S1">S1</option>
                <option value="S2">S2</option>
                <option value="S3">S3</option>
            </select>
            @error('last_education')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        </div>     
        
        <div class="mb-3">
            <label for="study_major_id" class="form-label">Jurusan</label>
            <select class="form-select @error('study_major_id') is-invalid @enderror" name="study_major_id">
                <option value="">Pilih Jurusan</option>
                @foreach ($study_majors as $study_major)
                <option value="{{ $study_major->id }}">{{ $study_major->study_name }}</option>
                @endforeach
            </select>
            @error('study_major_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="deadline" class="form-label">Batas Post</label>
            <input type="date" class="form-control @error('deadline') is-invalid @enderror" id="deadline" name="deadline" value="{{ old('deadline') }}">
            @error('deadline')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <input id="description" type="hidden" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}" >
            <trix-editor input="description"></trix-editor>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-warning">Save</button>
    </form>
</div>

    <script>
document.addEventListener('trix-file-accept', function(e){
    e.preventDefault();
})


    </script>
@endsection