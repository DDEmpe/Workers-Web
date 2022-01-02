@extends ('landing.layouts.mains')
@section('container')

    <div class="main-body">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item"><a href="/profile">{{ auth()->user()->name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit User Profile</li>
            </ol>
        </nav>
        <!-- /Breadcrumb -->

        <form action="edit" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <div class="rounded-circle" style="width: 15vw; height: 15vw; overflow: hidden;">
                                    <img src="{{ Auth()->user()->profile_img }}" alt="Admin"
                                        style="width:100%; height:auto">
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="profile_img" class="form-label">Edit Foto Profil</label>
                                    <input type="hidden" name="oldprofile_img" value="{{ auth()->user()->profile_img }}">
                                    <input class="form-control form-control-sm" name="profile_img" id="profile_img"
                                        type="file">
                                </div>

                                <div class="mt-3">
                                    <h4>{{ Auth()->user()->name }}</h4>
                                    <p class="text-secondary mb-1">
                                        {{ Auth()->user()->user_detail->profession->profession_name }}</p>
                                    <p class="text-muted font-size-sm"> {{ Auth()->user()->address }} </p>
                                </div>
                            </div>
                            <hr class="my-4">
                            <ul class="list-group list-group-flush">
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap mb-3">
                                    <h6>Current PDF :</h6>
                                    <p><a href="{{ auth()->user()->user_detail->cv_url }}">Click to Download</a></p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-globe me-2 icon-inline">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="2" y1="12" x2="22" y2="12"></line>
                                            <path
                                                d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                            </path>
                                        </svg>PDF</h6>
                                    <span class="text-secondary my-2">
                                        <input type="hidden" name="oldcvc_url"
                                            value="{{ Auth()->user()->user_detail->cv_url }}">
                                        <input type="hidden" name="status_id" value="{{ auth()->user()->status_id }}">
                                        <input type="file" class="form-control form-control-sm" name="cv_url" id="cv_url">
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Nama Lengkap</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name', Auth()->user()->name) }}">
                                    @error('name')
                                        <div class="invlalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email', Auth()->user()->email) }}">
                                    @error('email')
                                        <div class="invlalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Nomor Telepon</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="telephone"
                                        class="form-control @error('telephone') is-invalid @enderror"
                                        value="{{ old('telephone', Auth()->user()->telephone) }}">
                                    @error('telephone')
                                        <div class="invlalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Pendidikan Terakhir</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <select class="form-control @error('last_education') is-invalid @enderror"
                                        name="last_education">
                                        @php
                                            $pendidikan = ['Tidak Ada', 'SMP', 'SMA', 'SMK', 'D1', 'D2', 'D3', 'S1', 'S2', 'S3'];
                                        @endphp
                                        <option value="null"> Pendidikan Terakhir Kamu</option>
                                        @foreach ($pendidikan as $key)
                                            @if (Auth()->user()->user_detail->last_education == $key)
                                                <option value="{{ $key }}" selected>{{ $key }}</option>
                                            @else
                                                <option value="{{ $key }}">{{ $key }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('last_education')
                                        <div class="invlalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Jurusan</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <select class="form-control @error('study_major_id') is-invalid @enderror"
                                        name="study_major_id">
                                        @foreach ($study_majors as $study_major)
                                            @if (Auth()->user()->user_detail->study_major->study_name == $study_major->id)
                                                <option value="{{ $study_major->id }}" selected>
                                                    {{ $study_major->study_name }}</option>
                                            @else
                                                <option value="{{ $study_major->id }}">{{ $study_major->study_name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('study_major_id')
                                        <div class="invlalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Profesi</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <select class="form-control @error('profession_id') is-invalid @enderror"
                                        name="profession_id">
                                        @foreach ($professions as $profession)
                                            @if (Auth()->user()->user_detail->profession->id == $profession->id)
                                                <option value="{{ $profession->id }}" selected>
                                                    {{ $profession->profession_name }}</option>
                                            @else
                                                <option value="{{ $profession->id }}">
                                                    {{ $profession->profession_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('profession_id')
                                        <div class="invlalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Alamat</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="address"
                                        class="form-control @error('address') is-invalid @enderror"
                                        value="{{ old('address', Auth()->user()->address) }}">
                                    @error('address')
                                        <div class="invlalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>



                            <div class="row mb-3 mt-5">
                                <h6 class="mb-0">Tentang Dirimu</h6>
                                <input id="description" type="hidden" name="description"
                                    Value="{{ old('description', Auth()->user()->description) }}">
                                <trix-editor input="description"></trix-editor>
                                @error('description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <small class="text-muted">
                                    Penjelasan Singkat Tentang Dirimu
                                </small>
                            </div>

                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="col-sm-9 text-secondary">
                                        <button class="btn btn-warning px-4" type="submit">
                                            Save Changes
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
