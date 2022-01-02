@extends('landing.layouts.mains')

@section('container')


<main class="form-signup-jobseeker mt-5">
                <h1 class="h3 mb-3 fw-normal text-center mb-5">Mohon Isi Data Kamu</h1>
                <form action="/register" method="post">
                    @csrf
                    <div class=" row justify-content-center">
                    <img src="/image/user.png" style="width: 200px;" alt="Users">
                    </div>

                    <div>
                        <h4>Nama Lengkap </h4>
                        <input type="text" name= "namadepan" class="form-control mb-3 "  placeholder="Nama Lengkap">
                    </div>

                      <div>
                        <h4>UserName </h4>
                        <input type="text" name="username" class="form-control mb-3" placeholder="UserName">
                    </div>

                      <div>
                        <h4>Email </h4>
                        <input type="email" name="email" class="form-control mb-3" placeholder="Email">
                    </div>

                      <div>
                          <h4>Password </h4>
                      <input type="password" name="password" class="form-control mb-3" placeholder="Password">
                    </div>
                    <div>
                        <h4>Profesi </h4>
                      <select name="profesi" id="profesi" class="form-control mb-3">
                          <option value=""> Profesi Kamu</option>
                        </select>
                    </div>
                        
                      <div>
                        <h4>Pendidikan Terakhir </h4>
                        <select name="pendidikanterakhir" id="pendidikan" class="form-control mb-3">
                          <option value="null"> Pendidikan Terakhir Kamu</option>
                          <option value="Tidak Ada">Tidak Ada</option>
                          <option value="SMP">SMP</option>
                          <option value="SMA">SMA</option>
                          <option value="SMK">SMK</option>
                          <option value="D1">D1</option>
                          <option value="D2">D2</option>
                          <option value="D3">D3</option>
                          <option value="S1">S1</option>
                          <option value="S2">S2</option>
                          <option value="S3">S3</option>
                        </select>
                        </div>

                      <div>
                        <h4>Jurusan </h4>
                      <select name="jurusan" id="jurusan" class="form-control mb-3">
                          <option value=""> Jurusan Kamu </option>
                        </select>
                    </div>
                    
                        <div>
                          <h4>Tentang Dirimu</h4>
                      <div class="mb-3">
                      <input id="deskripsi" type="hidden" name="deskripsi" >
                      <trix-editor input="deskripsi"></trix-editor>
                      @error('deskripsi')
                          <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <small class = "text-muted">
                          Penjelasan Singkat Tentang Dirimu
                        </small>
                     </div>
                    </div>

                    <div class=" row justify-content-center">
                <button class="w-50 btn btn-lg btn-warning mt-4" type="submit">Register</button>
                </div>
            </form>
            <small class="d-block text-center mt-4 mb-5"> Already Have Account?? <a href="/login">Log In!</a></small>
        </main>
     </div>
</div>


@endsection