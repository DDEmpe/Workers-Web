@extends ('landing.layouts.mains')
@section('container')

<div class="container">
    <div class="main-body">
    
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item">{{$users->name}}</li>
              <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <div class="rounded-circle" style="width: 15vw; height: 15vw; overflow: hidden;">
                      <img src="{{ $users->profile_img }}" alt="Admin" style="width:100%; height:auto">
                    </div>
                    <div class="mt-3">
                      <h4>{{ $users->name }}</h4>
                      <p class="text-secondary mb-1">{{$users->user_detail->profession->profession_name }}</p>
                      <p class="text-muted font-size-sm"> {{ $users->address }}   </p>
                    </div>
                  </div>
                  <hr class="my-1">
                  <ul class="list-group list-group-flush">
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap mb-3" style="overflow: hidden";>
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe me-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>PDF</h6>
                            <span class="text-secondary"><a href="{{$users->user_detail->cv_url}}" class="d-flex" style="flex-direction: column;" >Click Here to Download</a></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                          <p> {!! $users->description !!}  </p>
                      </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nama Lengkap</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ $users->name }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Jenis Kelamin</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ $users->user_detail->gender }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ $users->email }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nomor Telpon</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ $users->telephone }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Pendidikan Terakhir</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ $users->user_detail->last_education }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Jurusan</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ $users->user_detail->study_major->study_name }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Profesi</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ $users->user_detail->profession->profession_name }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ $users->address }}
                    </div>
                  </div>
                  <hr>
                  <form action="/dashboard/pelamar/{{ $users->username }}" method="post" >
                    @method('put')
                    @csrf
                    @foreach($apply as $app)
                    <input type="hidden" name="uid" value={{ $app->uid }}>
                    @endforeach
                    <div class="row">
                        <div class="col-sm-3 text-align-center">
                            <button value="Accept" name="status" type="submit" class="btn btn-warning">Terima</button>
                        </div>
                        <div class="col-sm-3 text-align-center">
                            <button value="Reject" name="status" type="submit" class="btn btn-warning">Tolak</button>
                        </div>
                      </div>
                  </form>
                
                </div>
            </div>
            </div>
          </div>

        </div>
    
@endsection