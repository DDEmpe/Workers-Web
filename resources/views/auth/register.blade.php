{{-- Register --}}
@extends('landing.layouts.mains')

@section('container')
<div class="registration row justify-content-center">
<p class="text-center fs-4 pb-2">Registrasi</p>
<main class="form-registration">
<form action="/register" method="post" enctype="multipart/form-data">
    @csrf      
      <div class="form-group ">
        <label for="inputUsername1">Username</label>
        <input type="text" name="username" class="form-control" id="inputUsername1" placeholder="Username" required value="{{ old('username') }}">
            @error('username')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
            @enderror
        </div>
      <div class="form-group">
        <label for="inputPassword4">Password</label>
        <input type="password" name ="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword4" placeholder="Password" reqquired>
            @error('password')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
            @enderror
        </div>
    <div class="form-group">
      <label for="inputNama1">Nama Lengkap</label>
      <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" id="inputNama1" placeholder="Nama Lengkap" required value="{{ old('nama_lengkap') }}">
        @error('nama_lengkap')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="image" class="form-label">Foto Profil</label>
        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
        @error('image')
        <div class="invalid-feedback">
        {{ $message }}
        </div>
    @enderror  
    </div>
    <div class="form-group">
      <label for="inputAlamat">Alamat</label>
      <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="inputAlamat" placeholder="Misalnya : Jl. Nama Jalan, Nomor" required value="{{ old('alamat') }}">
      @error('alamat')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
      <div class="form-group">
        <label for="inputTelp">Telepon</label>
        <input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror" id="InputTelp" placeholder="No. Telepon" required value="{{ old('telepon') }}">
        @error('telepon')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
        @enderror
    </div>
      <div class="form-group">
        <label for="InputEmail">Email</label>
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="InputEmail" placeholder="E-mail" required value="{{ old('email') }}">
        @error('email')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
        @enderror  
    </div>
    </div>
    <div class="col text-center">
         <button type="submit" class="btn btn-primary mt-3 btn-lg">Daftar</button>  
    </div>  
</form>
</main>
</div>
    @endsection