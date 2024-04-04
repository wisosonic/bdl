<nav id="nav-menu-container">
    <ul class="nav-menu">
        <li class="menu-active"><a href="#intro">Registrations</a></li>
        <li class="buy-tickets">
            <a data-bs-toggle="modal" data-bs-target="#exampleModalToggle2" href="#" >Register Now</a>
        </li>
        @foreach ($alt_lang_tr as $index => $l)
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </a>
                </form>
            </li>
        @endforeach
    </ul>
</nav><!-- #nav-menu-container -->

