@extends('landing.layouts.mains')

@section('container')


    <main class="form-signup-company mt-5">
        <h1 class="h3 mb-3 fw-normal text-center mb-5">Mohon Isi Data Kamu Sebagai Company</h1>
        <form action="/register" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center">
                <img src="/image/user.png" style="width: 300px ;" alt="">
            </div>

            <div>
                <h4>Nama Usaha </h4>
                <input type="text" class="form-control mb-3" name="name" placeholder="Nama usaha anda" value="{{ old('name') }}">
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>


            <input type="hidden" name="status_id" value="3">

            <div>
                <h4>UserName </h4>
                <input type="text" class="form-control mb-3" name="username" placeholder="Username" value="{{ old('username') }}">
                @error('username')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="profile_img" class="form-label">Gambar Perusahaan</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input class="form-control @error('profile_img') is-invalid @enderror" type="file" id="profile_img"
                name="profile_img" value="{{ old('profile_img') }}">
                 @error('profile_img')
                 <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <h4>Email </h4>
                <input type="email" class="form-control mb-3" name="email" placeholder="email@example.com" value="{{ old('email') }}">
                @error('email')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <h4>Password </h4>
                <input type="password" class="form-control mb-3" name="password" placeholder="Password">
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
                <h4>Kategori </h4>
                <select name="company_category_id" id="company_category_id" class="form-select mb-3">
                    <option value=""> Kategori Perusahaan</option>
                    @foreach ($company_categories as $category)    
                    <option value="{{$category->id}}"> {{$category->company_category_name}} </option>
                    @endforeach
                </select>
                @error('company_category_id')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <h4>Tentang Usaha</h4>
                <div class="mb-3">
                    <input id="description" type="hidden" name="description" value="{{ old('description') }}">                   
                    <trix-editor input="description"></trix-editor>
                    @error('description')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <small class="text-muted">
                        Penjelasan Singkat Tentang Perusahaan
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
                const category_old = "{{ old('company_category_id') }}";
                if(category_old !== ''){
                  $('#company_category_id').val(category_old);
                }
        });
    </script>
@endsection
