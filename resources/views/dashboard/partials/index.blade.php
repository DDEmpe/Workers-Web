<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard')? 'active': ''   }}" aria-current="page" href="/">
              <span data-feather="home"></span>
              Home
            </a>
          </li>

          @if (auth()->user()->status_id == 2)
          
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/applied_job')? 'active': ''   }}" href="/dashboard/applied_job">
              <span data-feather="briefcase"></span>
              Lamaran
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/interview_user')? 'active': ''   }}" href="/dashboard/interview_user">
              <span data-feather="message-square"></span>
              interview
            </a>
          </li>

          @else
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/pelamar')? 'active': ''   }}" href="/dashboard/pelamar">
              <span data-feather="file"></span>
              Pelamar
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/lowongan')? 'active': ''   }}" href="/dashboard/lowongan">
              <span data-feather="briefcase"></span>
              Lowongan
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/interview')? 'active': ''   }}" href="/dashboard/interview">
              <span data-feather="message-square"></span>
              Interview
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a class="nav-link" href="/profile">
              <span data-feather="user"></span>
              Profile
            </a>
          </li>
          
          <li class="nav-item">
          <form action="/logout" method="post">
                @csrf
                <button type="submit" class="nav-link" style="border-style: none; background-color:transparent"> <span data-feather="log-out"></span>
                    Logout </button>
            </form>
          </li>
        </ul>
        
      </div>
    </nav>
  </div>
</div>