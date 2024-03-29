<nav id="nav-menu-container">
    <ul class="nav-menu">
        <li class="menu-active"><a href="#intro">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#speakers">Speakers</a></li>
        <li><a href="#schedule">Schedule</a></li>
        <!-- <li><a href="#venue">Venue</a></li> -->
        <!-- <li><a href="#gallery">Gallery</a></li> -->
        <li><a href="#sponsors">Sponsors</a></li>
        <!-- <li><a href="#contact">Contact</a></li> -->
        <li class="buy-tickets">
            <a data-bs-toggle="modal" data-bs-target="#exampleModalToggle2" href="#" >Register Now</a>
        </li>
        @foreach ($alt_lang_tr as $index => $l)
            <!-- <li><a href="?lang={{$alt_lang[$index]}}">{{$l}}</a></li> -->
        @endforeach
    </ul>
</nav><!-- #nav-menu-container -->

