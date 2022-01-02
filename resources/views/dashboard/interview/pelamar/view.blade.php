@extends('landing.layouts.mains')
@section('container')


@foreach ($interview as $inter)
        <div class="container-fluid p-3" style="background-color: white;">
        <p class="display-6 text-center" id="section-title" style="opacity: 1;">{{ $inter->job_vacancy->branch }}</p>  
        <hr>
        <p style="margin : 0;">Tanggal Interview : {{ $inter ->interview_date  }}</p>
        @if($inter->online=='1')
        <p style="margin : 0;">Jenis Wawancara :   Online</p>
        @elseif($inter->offline=='1')
        <p style="margin : 0;">Jenis Wawancara :  Offline</p>
        @endif
        <p style="margin : 0;">Alamat : {{ $inter ->address }}</p>
        <hr>
        <p>Catatan<p>
        <p>{!! $inter->notes !!}</p> 
        <div class="col text-center">
@endforeach
    </div>
    </div>
    <a href="/dashboard/interview_user" class="btn btn-warning">
        Kembali
        </a>

@endsection
