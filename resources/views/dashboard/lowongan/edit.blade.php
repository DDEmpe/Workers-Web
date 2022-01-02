@extends('Landing.Layouts.mains')
@section('container')
<div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"> Edit Lowongan </h1>
</div>

<div class="col-lg-8 ">
    <form action="/dashboard/lowongan/{{ $job_vacancies->id }}" method="post" class="mb-5" enctype="multipart/form-data">
       @method('put')
        @csrf
        <div class="mb-3">
            <label for="branch" class="form-label">Nama Lowongan</label>
            <input type="text" class="form-control @error('branch') is-invalid @enderror"
            value="{{ old('branch', $job_vacancies->branch) }}"
            id="branch" name="branch" required
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
            <input type="text" class="form-control @error('address') is-invalid @enderror"
            value="{{ old('address', $job_vacancies->address) }}"
            id="address" name="address" required
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
                @if ($job_vacancies->departement_id  == $department->id)
                <option value="{{ $department->id }}" selected>{{ $department->departement_name }}</option>
            @else
                <option value="{{ $department->id }}">{{ $department->departement_name }}</option>
            @endif            
            @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="job_type" class="form-label">Jenis Kerja</label>
            <select class="form-select" name="job_type">
                @php 
                $jenken = array("Part-Time","Full-Time","Freelance");
                @endphp
                <option value="null" selected>Pilih Jenis Kerja</option>
                @foreach ($jenken as $key)
                @if ($job_vacancies->job_type == $key)
                    <option value="{{ $key }}" selected>{{ $key }}</option>
                @else
                    <option value="{{ $key }}">{{ $key }}</option>
                @endif
            @endforeach
            </select>
        </div>


        <div class="mb-3">
            <label for="min_wages" class="form-label">Gaji Minimal</label>
            <input type="text" class="form-control @error('min_wages') is-invalid @enderror"
            value="{{ old('min_wages', $job_vacancies->min_wages) }}"
            id="min_wages" name="min_wages" required>
            @error('min_wages')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="max_wages" class="form-label">Gaji Maksimal</label>
            <input type="text" class="form-control @error('max_wages') is-invalid @enderror" 
            value="{{ old('max_wages', $job_vacancies->max_wages) }}"
            id="max_wages" name="max_wages" required>
            @error('max_wages')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="last_education" class="form-label">Minimum Pendidikan</label>
            <select class="form-select" name="last_education">
                @php 
                $pendidikan = array("Tidak Ada","SMP","SMA","SMK","D1","D2","D3","S1","S2","S3");
                @endphp
                <option value="null"> Minimum Pendidikan</option>
                @foreach ($pendidikan as $key)
                @if ($job_vacancies->last_education == $key)
                    <option value="{{ $key }}" selected>{{ $key }}</option>
                @else
                    <option value="{{ $key }}">{{ $key }}</option>
                @endif
            @endforeach
            </select>                        
            </select>
        </div>     
        
        <div class="mb-3">
            <label for="study_major_id" class="form-label">Jurusan</label>
            <select class="form-select" name="study_major_id">
                <option value="null">Pilih Jurusan</option>
                @foreach ($study_majors as $study_major)
                @if ($job_vacancies->study_major_id == $study_major->id)
                <option value="{{ $study_major->id }}" selected>{{ $study_major->study_name }}</option>
            @else
                <option value="{{ $study_major->id }}">{{ $study_major->study_name }}</option>
            @endif
            @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="deadline" class="form-label">Batas Post</label>
            <input type="date" class="form-control @error('deadline') is-invalid @enderror"
            value="{{ date('Y-m-d', strtotime($job_vacancies->deadline)) }}"
            id="deadline" name="deadline" required >
            @error('deadline')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <input id="description" type="hidden" name="description"
            Value ="{{ old('description', $job_vacancies->description) }}" >
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