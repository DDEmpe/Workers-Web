{{-- Register --}}
@extends('landing.layouts.mains')

@section('container')

    <div class="row justify-content-center" style="text-align:center;">

        <p>Kamu Adalah ...</p>
        <p>Pilih Salah Satu Dari Pilihan Dibawah Ini</p>
        <div class="row mt-1 mb-3 justify-content-center" >
            
            <a href="/signupjob" class="btn btn-warning" style="width: 50vh; font-size: 20px; font-weight: bold">
                Job Seeker
            </a>
        </div>
        <div class="row justify-content-center">
            <a href="/signupcomp" class="btn btn-warning" style="width:50vh; font-size: 20px; font-weight: bold">
            Company
            </a>
        </div>
   
</div>
@endsection