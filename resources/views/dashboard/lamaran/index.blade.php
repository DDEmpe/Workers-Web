@extends('dashboard.layouts.main')
@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">lamaran {{auth()->user()->name }}</h1>
    </div>

    <div class="table-responsive col-lg-10">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
                <th scope="col">#</th>
              <th scope="col">Nama Lowongan</th>
              <th scope="col">Alamat</th>
              <th scope="col">Job Type</th>
              <th scope="col">Status</th>
              <th scope="col">interview</th>
            </tr>
          </thead>
          <tbody>
              @foreach($lamarans as $lamaran)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $lamaran -> branch }}</td>
              <td>{{ $lamaran -> location }}</td>
              <td>{{ $lamaran -> job_type }}</td>
              @if($lamaran->accepted==true)
                <td>Accepted</td>
              @elseif($lamaran->rejected==true)
                <td>Rejected</td>
              @elseif($lamaran->onwait==true)
                <td>Wait List</td>
              
              @endif
              @if($lamaran -> interview=='1')
              <td>Ada Interview</td>
              @elseif($lamaran -> interview=='0')
              <td>Belum Ada Interview</td>
              @endif
              <td>
                  <form action="/dashboard/applied_job/{{ $lamaran->uid }}" method="post" class="d-inline">
                @csrf
                <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Yakin Menghapus data lowongan')">
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