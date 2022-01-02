@extends('landing.layouts.mains')
@section('container')

    <div class="jumbotron jumbotron-fluid mt-5 mb-5">
        <div class="container px-5">
            <h1 class="display-4" style="font-weight: bold">Selamat datang di Worker's</h1>
            <p class="lead">Mempermudah anda dalam mencari pekerjaan dan pegawai</p>
        </div>
    </div>

    <hr>

    <div class="container mt-5 mb-5 fluid">
        <div class="row justify-content-center">
            <div class="col-sm-12 text-center">
                <h2 class="judul">Lowongan Pekerjaan</h2>
                <p class="mb-5 text-muted">Berikut adalah lowongan pekerjaan yang sedang tersedia pada Worker's</p>
            </div>

            <nav class="navbar mb-5 justify-content-center">
                <form action="/search" class="form-inline">
                    @csrf
                    <input class="form-control d-inline-block" type="search" placeholder="Search" aria-label="Search"
                        style="width: 50vw; height" name="search" value="{{ request('search') }}">
                    <button class="btn btn-warning mb-1" type="submit">Search</button>
                </form>
            </nav>
        </div>


        <div class="row justify-content-evenly mx-5">
            {{-- perulangan --}}

            @foreach ($job_vacancies as $job_vacancy)

                <div class="col-sm-3 col-sm-offset-5 text-center card">
                    <img src={{ $job_vacancy->profile_img }} alt="" class="card-img-top mt-3">
                    <div class="card-body">
                        <h5 class="mb-1 text card-title" style="font-weight:bold;">{{ $job_vacancy->branch }}</h5>
                        <p class="job-company-name">
                            {{ $job_vacancy->name }}
                        </p>
                        <p class="job-location">
                            {{ $job_vacancy->address }}
                        </p>
                        <p class="job_pay">
                            Rp.{{ $job_vacancy->min_wages }} to Rp.{{ $job_vacancy->max_wages }}
                        </p>
                        <a href="/job_detail/{{ $job_vacancy->uid_job_vacancy }}" class="btn btn-warning">Lihat
                            Lowongan</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="d-flex justify-content-center">
        {{ $job_vacancies->links() }}
    </div>

    <div class="container">
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item">
                    <a href="#" class="nav-link px-2 text-muted">Terms of Conditions</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link px-2 text-muted">Privacy Policy</a>
                </li>
                <li class="nav-item">
                    <a href="/aboutus" class="nav-link px-2 text-muted">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link px-2 text-muted">Contact : ccdteam186@gmail.com</a>
                </li>
            </ul>
            <p class="text-center text-muted">&copy; 2021 CCD</p>
        </footer>
    </div>
@endsection
