@extends('landing.layouts.mains')

@section('container')

<div class="login row justify-content-center">
        <div class="col-md-5">

            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
  

            <main class="form-signin mt-5">
                <h1 class="h3 mb-3 fw-normal text-center mb-5">Login</h1>
                <form action="/login" method="post">
                    @csrf
                    <div class="form-floating">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            placeholder="name@example.com" autofocus value="{{ old('email') }}">
                        <label for="email">Email</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
                        <label for="password">Password</label>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>

                    <button class="w-100 btn btn-lg btn-warning mt-3" type="submit">Login</button>
                </form>
                <small class="d-block text-center mt-3"> Not Registered? <a href="/register">Register Now!</a></small>
            </main>
         </div>
</div>
@endsection
