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
            <input type="text" class="form-control @error('branch') is-invalid @enderror" id="branch" name="branch" required
                autofocus >
            @error('branch')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <input type="hidden" name="interview" value="0">


        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" required
                >
            @error('address')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="departement_id" class="form-label">Bidang</label>
            <select class="form-select" name="departement_id">
                <option value="null" selected>Pilih Bidang </option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->departement_name }}</option>
            @endforeach
            </select>
        </div>


        <div class="mb-3">
            <label for="job_type" class="form-label">Jenis Kerja</label>
            <select class="form-select" name="job_type">
                <option value="null" selected>Pilih Jenis Kerja</option>
                <option value="Part-Time" >Part-Time</option>
                <option value="Full-Time" >Full-Time</option>
                <option value="Freelance" >Freelance</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="min_wages" class="form-label">Gaji Minimal</label>
            <input type="text" class="form-control @error('min_wages') is-invalid @enderror" id="min_wages" name="min_wages" required>
            @error('min_wages')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="max_wages" class="form-label">Gaji Maksimal</label>
            <input type="text" class="form-control @error('max_wages') is-invalid @enderror" id="max_wages" name="max_wages" required>
            @error('max_wages')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="last_education" class="form-label">Minimum Pendidikan</label>
            <select class="form-select" name="last_education">
                <option value="null"> Minimum Pendidikan</option>
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
        </div>     
        
        <div class="mb-3">
            <label for="study_major_id" class="form-label">Jurusan</label>
            <select class="form-select" name="study_major_id">
                <option value="null">Pilih Jurusan</option>
                @foreach ($study_majors as $study_major)
                <option value="{{ $study_major->id }}">{{ $study_major->study_name }}</option>
        @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="deadline" class="form-label">Batas Post</label>
            <input type="date" class="form-control @error('deadline') is-invalid @enderror" id="deadline" name="deadline" required
                >
            @error('deadline')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <input id="description" type="hidden" name="description" >
            <trix-editor input="description"></trix-editor>
            @error('description ')
                <p class="text-danger">{{ $message }}</p>
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