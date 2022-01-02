@extends('dashboard.layouts.main')
@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Pelamar {{ Auth()->user()->name }}</h1>
    </div>

    <div class="table-responsive col-lg-10">

        <table class="table table-striped table-sm">
          <thead>
            <tr>
                <th scope="col">#</th>
              <th scope="col">Nama Pelamar</th>
              <th scope="col">Alamat</th>
              <th scope="col">Lowongan Post</th> 
              <th scope="col">Status</th> 
              <th scope="col">Aksi </th>
            </tr>
          </thead>
          <tbody>
            @foreach($apply_jobs as $apply)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $apply->name  }}</td>
              <td>{{ $apply->address }}</td>
              <td>{{ $apply->branch }}</td>
              @if($apply->accepted==true)
                <td>Accepted</td>
              @elseif($apply->rejected==true)
                <td>Rejected</td>
              @elseif($apply->onwait==true)
                <td>Wait List</td>
              
              @endif
              <td>
                <a href="/dashboard/pelamar/{{ $apply->uid }}/edit" class="badge bg-info"> <span data-feather="eye"> </span></a>
                <form action="/dashboard/pelamar/{{ $apply->uid }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Yakin Menghapus data appliers')">
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