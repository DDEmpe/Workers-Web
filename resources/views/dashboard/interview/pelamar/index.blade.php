@extends('dashboard.layouts.main')
@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Interview {{ Auth()->user()->name }}</h1>
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
              <th scope="col">Aksi</th>    
            </tr>
          </thead>
          @php
              $a=0;
          @endphp
          <tbody>
            @for ($i = 0; $i < $anu; $i++)
            @foreach ($collection[$i] as $item)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{$item->job_vacancy->branch}}</td>
              <td>{{$item->address}}</td>
              <td>{{$item->interview_date}}</td>
              <td class="anu" id="anu" value="">{{$status[$a++]}}</td>
              <td>{{$item->notes}}</td>
              <td>
                <a href="/dashboard/interview_user/{{ $item->uid_interview }}" class="badge bg-primary"><span data-feather="eye"></span></a>
                </td>
              </tr>
            @endforeach
            @endfor

            
          </tbody>
        </table>
      </div>



  </main>
@endsection