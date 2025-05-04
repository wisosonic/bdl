<style>
  .header .logo img {
    max-height: 90px;
  }
</style>
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="/img/logo.png" alt="">
        <!-- <h1 class="sitename">Dewi</h1> -->
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="/#home" class="active">Home</a></li>
          <li class="dropdown"><a href="#"><span>About</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
                <li><a href="/#about">BDL</a></li>
                <li><a href="/#team">Team</a></li>
                <li><a href="/members">Members</a></li>
                <!-- <li><a href="/#clients">Sponsors</a></li> -->
            </ul>
          </li>
          <!-- <li><a href="/#services">Services</a></li> -->
          <li class="dropdown"><a href="#"><span>Events</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <!-- <li><a href="#">Dropdown 1</a></li> -->
              <li class="dropdown"><a href="#"><span>Scientific Days</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  @foreach($events as $event)
                  <li><a href="/events/{{$event->id}}">{{$event->edition}}th edition - {{$event->city}}</a></li>
                  @endforeach
                </ul>
              </li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>LDA</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="/lda/foundation">Foundation</a></li>
              <li><a href="/lda/dentistry-regulations">Dentistry Regulations</a></li>
              <li><a href="/lda/internal-regulations">Internal Regulations</a></li>
              <li><a href="/lda/retirement-fund">Retirement Fund</a></li>
              <li><a href="/lda/mutual-fund">Mutual Fund</a></li>
              <li><a href="/lda/dentists-duties">Dentists Duties</a></li>
              <li><a href="/lda/new-clinic-standards">New Clinic Standards</a></li>
            </ul>
          </li>
          <!-- <li><a href="/#portfolio">Portfolio</a></li> -->
          <li><a href="/#contact">Contact</a></li>
          @if(Auth::user())
          <li class="dropdown"><a href="#"><span>{{Auth::user()->name}}</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <form id="logout_form" method="POST" action="/logout">@csrf</form>
              <li><a href="/profile">My Profile</a></li>
              <li><a href="#" onclick="logout()">Logout</a></li>
            </ul>
          </li>
          @else
          <!-- <li><a class="cta-btn" href="/login">Login</a></li> -->
          @endif
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      

    </div>
  </header>