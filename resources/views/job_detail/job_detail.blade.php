@extends('landing.layouts.mains')
@section('container')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/home">Home</a></li>
    <li class="breadcrumb-item">Details</a></li>
    <li class="breadcrumb-item active" aria-current="page" id="breadcrumjudul">[NAMA LOWONGAN]</li>
  </ol>
</nav>
  @foreach ($user as $usr)
  <img src={{ $usr->profile_img }} class="rounded mx-auto d-block" style="background-color: white; border-color: lightblue; border-style: solid; border-width: 1px;" width="25%">
  @endforeach
      
      <div class="container-fluid p-3" style="background-color: white;">
      <p class="display-6 text-center" id="section-title" style="opacity: 1;">{{ $job_vacancy -> branch }}</p>
      @foreach ($user as $usr)
      <a href="/profile/company/{{ $usr->username}}">
      {{ $usr->name }}
      </a>
      @endforeach

      <hr>
      <p style="margin : 0;">Bidang : {{ $job_vacancy -> department->departement_name  }}</p>
      <p style="margin : 0;">Alamat : {{ $job_vacancy -> address }}</p>
      <p style="margin : 0;">Jenis Kerja :  {{ $job_vacancy -> job_type }}</p>
      <p style="margin : 0;">Minimum Pendidikan : {{ $job_vacancy -> last_education }} </p>
      <p style="margin : 0;">Jurusan : {{ $job_vacancy -> study_major->study_name }} </p>
      <p>Gaji : {{ $job_vacancy -> min_wages }} sampai {{ $job_vacancy -> max_wages }}</p>
      <hr>
      <p>Deskripsi Pekerjaan<p>
      <p>{!! $job_vacancy-> description !!}</p>
      <hr>
     <p>Tentang Perusahaan<p>
      @foreach ($user as $usr)
      <p>{!! $usr->description !!}</p>
      @endforeach
      <div class="col text-center">
        <form action="/applyjob/store" method="POST">
          @csrf
          <input type="hidden" name="job_vacancy_id" value={{ $job_vacancy -> id }}>
          <input type="hidden" name="company_id" value={{ $job_vacancy -> company_id  }}>
          @if(Auth::user()->status_id =='2')
          <button type="submit" class="btn btn-outline-primary btn-lg mt-3" style="padding: 8px 55px;">Apply</button>
          @endif
        </form>
  </div>
  </div>
@endsection