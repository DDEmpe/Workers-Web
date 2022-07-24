@extends('dashboard.layouts.main')
@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Lowongan {{ Auth()->user()->name }}</h1>
    </div>

    <div class="table-responsive col-lg-10">
        <a href="/dashboard/lowongan/create" class="btn btn-warning mb-3">
        Buat Lowongan Baru
        </a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
                <th scope="col">#</th>
              <th scope="col">Nama Lowongan</th>
              <th scope="col">Alamat</th>
              <th scope="col">Bidang</th>
              <th scope="col">Batas Aktif Post</th>    
              <th scope="col">Aksi </th>
            </tr>
          </thead>
          <tbody>
              @foreach($job_vacancies as $job_vacancy)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $job_vacancy -> branch }}</td>
              <td>{{ $job_vacancy -> location }}</td>
              <td>{{ $job_vacancy->department->departement_name}}</td>
              <td>{{ $job_vacancy -> deadline }}</td>
              <td>
                  <a href="/dashboard/lowongan/{{ $job_vacancy->id }}/edit" class="badge bg-warning"> <span data-feather="edit"> </span></a>
                  <form action="/dashboard/lowongan/{{ $job_vacancy->id }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Yakin Menghapus data lowongan')">
                    <span data-feather="trash">
                </button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>



  </main>
@endsection