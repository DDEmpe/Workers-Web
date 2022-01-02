{{-- About --}}

@extends('landing.layouts.mains')
@section('container')

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">About Us</li>
            </ol>
        </nav>
        <p class="display-6">Tentang Kami</p>
        <p>Creative Creator Digital merupakan team founder dari worker's</p>
    </div>
    <br>
    <div class="container" id="contactus">
        <p class="display-6">Kontak Kami</p>
        <p> ccdteam186@gmail.com</p>
        <div class="container">

        </div>
    </div>

    <!-- FOOTER -->
    <div class="container">
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item">
                    <a href="/ToC#toc" class="nav-link px-2 text-muted">Terms of Conditions</a>
                </li>
                <li class="nav-item">
                    <a href="/ToC#pp" class="nav-link px-2 text-muted">Privacy Policy</a>
                </li>
                <li class="nav-item">
                    <a href="/About" class="nav-link px-2 text-muted">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a href="/About#contactus" class="nav-link px-2 text-muted">Contact</a>
                </li>
            </ul>
            <p class="text-center text-muted">&copy; 2021 CCD</p>
        </footer>
    </div>
@endsection
