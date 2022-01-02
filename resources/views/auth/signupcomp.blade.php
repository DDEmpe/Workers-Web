@extends('landing.layouts.mains')

@section('container')


<main class="form-signup-company mt-5">
                <h1 class="h3 mb-3 fw-normal text-center mb-5">Please Fill your basic profile</h1>
                <form action="/register" method="post">
                    @csrf
                    <div class="row justify-content-center">
                    <img src="/image/user.png" style="width: 300px ;" alt="">
                    </div>

                    <div>
                        <h4>Nama Usaha </h4>
                        <input type="text" class="form-control mb-3" name="" placeholder="Nama usaha anda">
                    </div>

                      <div>
                        <h4>Email </h4>
                        <input type="email" class="form-control mb-3" name="" placeholder="email@example.com">
                    </div>

                        <div>
                          <h4>Password </h4>
                      <input type="password" class="form-control mb-3" name="" placeholder="Password">
                    </div>

                      <div>
                        <h4>Kategori </h4>
                      <select name="Kategori" id="kategori_usaha" class="form-control mb-3" name="">
                          <option value="">== Kategori Usaha==</option>
                        </select>
                    </div>

                        <div>
                          <h4>Tentang Usaha</h4>
                      <div class="mb-3">
                      <input id="deskripsi" type="hidden" name="deskripsi" >
                      <trix-editor input="deskripsi"></trix-editor>
                      @error('deskripsi')
                          <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <small class = "text-muted">
                          Penjelasan Singkat Tentang Perusahaan
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