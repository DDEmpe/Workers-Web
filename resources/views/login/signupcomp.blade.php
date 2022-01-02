@extends('landing.layouts.mains')

@section('container')


    <main class="form-signup-company mt-5">
        <h1 class="h3 mb-3 fw-normal text-center mb-5">Please Fill your basic profile</h1>
        <form action="/register" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center">
                <img src="/image/user.png" style="width: 300px ;" alt="">
            </div>

            <div>
                <h4>Nama Usaha </h4>
                <input type="text" class="form-control mb-3" name="name" placeholder="Nama usaha anda">
            </div>


            <input type="hidden" name="status_id" value="3">

            <div>
                <h4>UserName </h4>
                <input type="text" class="form-control mb-3" name="username" placeholder="Username">
            </div>

            <div class="mb-3">
                <label for="profile_img" class="form-label">Gambar Perusahaan</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input class="form-control @error('profile_img') is-invalid @enderror" type="file" id="profile_img"
                    name="profile_img">
                @error('profile_img')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div>
                <h4>Email </h4>
                <input type="email" class="form-control mb-3" name="email" placeholder="email@example.com">
            </div>

            <div>
                <h4>Password </h4>
                <input type="password" class="form-control mb-3" name="password" placeholder="Password">
            </div>

            <div>
                <h4>Kategori </h4>
                <select name="company_category_id" id="company_category_id" class="form-select mb-3">
                    @foreach ($company_categories as $category)    
                    <option value="{{$category->id}}"> {{$category->company_category_name}} </option>
                    @endforeach
                </select>
            </div>

            <div>
                <h4>Tentang Usaha</h4>
                <div class="mb-3">
                    <input id="description" type="hidden" name="description">
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
        <small class="d-block text-center mt-4 mb-5"> Already Have Account?? <a href="/login">Log In!</a></small>
    </main>
    </div>
    </div>


@endsection
