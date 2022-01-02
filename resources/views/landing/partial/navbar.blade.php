<nav class="navbar navbar-expand-lg navbar-light border-bottom">

    <div class="container-fluid">
        <img src="/image/logo.png" style="width: 100px;" alt="">
        <a class="navbar-brand mx-2" href="/home">Worker's</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end ms-5" id="navbarNav">
            @auth
                <li class="nav-item dropdown" style="text-">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Halo, {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu border-0" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="/dashboard"> <i class="bi bi-layout-text-window-reverse"></i>Dashboard saya</a></li>
                        <li><a class="dropdown-item" href="/profile"><i class="bi bi-cart3"></i> Profile Saya</a></li>
                        <hr>

                        <form action="/logout" method="POST">
                            @csrf
                            <button data-toggle="modal" data-target="#logoutmodal" class="dropdown-item"
                            id="modal-logout"><i class="bi bi-box-arrow-right"></i>
                            Logout</button>
                        </form>    
                    </ul>
                </li>
            @else
                <li class="nav-item" style="list-style: none">
                    <a class="btn btn-warning {{ Request::is('login') ? 'active' : '' }}" href="/login">Login</a>
                </li>
                <li class="nav-item" style="list-style: none">
                    <a class="btn btn-warning {{ Request::is('register') ? 'active' : '' }}" href="/register">Register</a>
                </li>
            @endauth
        </div>
    </div>
</nav>
