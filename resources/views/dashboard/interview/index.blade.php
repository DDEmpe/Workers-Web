@extends('dashboard.layouts.main')
@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Interview {{ Auth()->user()->name }}</h1>
    </div>
    @if(session()->has('message'))
      <div class="alert alert-success">
          {{ session()->get('message') }}
      </div>
    @endif
    <div class="card-toolbar">
      <!--begin::Button-->
      <a href="/dashboard/interview/create" class="btn btn-warning font-weight-bolder">
          <span class="flaticon2-add"> Buat Jadwal Interview</span>
      </a>
      <!--end::Button-->
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama Lowongan</th>
              <th scope="col">Alamat</th>
              <th scope="col">Jadwal Interview</th>
              <th scope="col">Jenis Interview</th>
              <th scope="col">Catatan</th>    
              <th scope="col">Aksi </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($collection as $item)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{$item->job_vacancy->branch}}</td>
              <td>{{$item->address}}</td>
              <td>{{$item->interview_date}}</td>
                @if($item->online==1)
                  <td>Online</td>
                @elseif($item->offline==1)
                <td>Offline</td>
                @endif
              </td>
              <td>{{$item->notes}}</td>
              <td>
                <a href="/dashboard/interview/{{$item->id}}/edit" class="badge bg-warning">
                  <span data-feather="edit"></span></a>
                <form action="/dashboard/interview/{{$item->id}}" method="POST" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0"
                      onclick="return confirm('Yakin Ingin Menghapus Jadwal Interview ini?')"><span
                          data-feather="trash"></span></button>
                </form>
              </td>

              </tr>
            @endforeach
          </tbody>
        </table>
      </div>



  </main>
@endsection