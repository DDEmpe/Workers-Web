@extends('landing.layouts.mains')

@section('container')


<main class="form-signup-jobseeker mt-5">
                <h1 class="h3 mb-3 fw-normal text-center mb-5">Mohon Isi Data Kamu Sebagai JobSeeker</h1>
                <form action="/register" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class=" row justify-content-center">
                    <img src="/image/user.png" style="width: 200px;" alt="Users">
                    </div>

                    <input type="hidden" name="status_id" value="2">

                    <div>
                        <h4>Nama Lengkap </h4>
                        <input type="text" name= "name" class="form-control mb-3 "  placeholder="Nama Lengkap" value="{{ old('name') }}">
                        @error('name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                      <h4>Jenis Kelamin </h4>
                      <select name="gender" id="kelamin" class="form-control mb-3">
                        <option value=""> Jenis Kelamin</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                      </div>
                      @error('gender')
                      <p class="text-danger">{{ $message }}</p>
                      @enderror
                      <div>
                      

                        <h4>UserName </h4>
                        <input type="text" name="username" class="form-control mb-3" placeholder="UserName" value="{{ old('username') }}">
                        @error('username')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                   <div>
                     <h4>Gambar Profile </h4>
                      <input class="form-control @error('profile_img') is-invalid @enderror" type="file" id="profile_img" name="profile_img">
                      @error('profile_img')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                  </div>
                

                      <div>
                        <h4>Email </h4>
                        <input type="email" name="email" class="form-control mb-3" placeholder="Email" value="{{ old('email') }}">
                        @error('email')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                          <h4>Password </h4>
                      <input type="password" name="password" class="form-control mb-3" placeholder="Password">
                      @error('password')
                      <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>

                      <div>
                        <h4>Ulang Password </h4>
                    <input type="password" name="password_confirmation" class="form-control mb-3" placeholder="Password">
                    @error('password_confirmation')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    </div>



                      <div>
                        <h4>Profesi </h4>
                      <select name="profession_id" id="profession_id" class="form-control mb-3">
                        <option value=""> Profesi Kamu </option>
                        @foreach ($professions as $profession)
                          <option value="{{ $profession->id }}">{{ $profession->profession_name }}</option>
                        @endforeach
                        </select>
                        @error('profession_id')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                        
                      <div>
                        <h4>Pendidikan Terakhir </h4>
                        <select name="last_education" id="pendidikan" class="form-control mb-3">
                          <option value=""> Pendidikan Terakhir Kamu</option>
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
                        @error('last_education')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        </div>

                      <div>
                        <h4>Jurusan </h4>
                      <select name="study_major_id" id="study_major_id" class="form-control mb-3" @error('study_major_id') is-invalid @enderror>
                          <option value=""> Jurusan Kamu </option>
                          @foreach ($study_majors as $study_major)
                          <option value="{{ $study_major->id }}"> {{ $study_major->study_name }}</option>
                          @endforeach
                        </select>
                        @error('study_major_id')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    
                        <div>
                          <h4>Tentang Dirimu</h4>
                      <div class="mb-3">
                        <input id="description" type="hidden" name="description" value="{{ old('description') }}" >
                      <trix-editor input="description"></trix-editor>
                      @error('description')
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
            <small class="d-block text-center mt-4 mb-5"> Sudah Punya Akun? <a href="/login">Log In!</a></small>
        </main>
     </div>
</div>


<script >
  
$(document).ready(function(){
  // const togglePassword = document.querySelector("#togglePassword");
  //       const password = document.querySelector("#password");

  //       togglePassword.addEventListener("click", function () {
  //           // toggle the type attribute
  //           const type = password.getAttribute("type") === "password" ? "text" : "password";
  //           password.setAttribute("type", type);
            
  //           // toggle the icon
  //           this.classList.toggle("fa-eye-slash");
  //       });

  //       // prevent form submit
  //       const form = document.querySelector("form");
  //       form.addEventListener('submit', function (e) {
  //           e.preventDefault();
  //       });

        const study_major_old = "{{ old('study_major_id') }}";
        if(study_major_old !== ''){
          $('#study_major_id').val(study_major_old);
        }
        const proffesion_old = "{{ old('profession_id') }}";
        if(proffesion_old !== ''){
          $('#profession_id').val(proffesion_old);
        }
        const pendidikan_old = "{{ old('last_education') }}";
        if(pendidikan_old !== ''){
          $('#pendidikan').val(pendidikan_old);
        }
        const gender_old = "{{ old('gender') }}";
        if(gender_old !== ''){
          $('#kelamin').val(gender_old);
        }
});

</script>

@endsection
