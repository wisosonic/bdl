@extends($lang . "/pages/base")

@section("content")
<main class="main">

<section id="home" class="hero section dark-background">

  <img src="/img/site/1580523-3840x2160-desktop-4k-beirut-wallpaper.jpg" alt="" data-aos="fade-in">

  <div class="container d-flex flex-column align-items-center">
    <h2 data-aos="fade-up" data-aos-delay="100">Knowledge. Community. Innovation.</h2>
    <p data-aos="fade-up" data-aos-delay="200">“Dentistry is not just about teeth. It’s about people.”</p>
    <p data-aos="fade-up" data-aos-delay="250"><i>— Dr. James R. Pride</i></p>
    <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
      <a href="#about" class="btn-get-started">Get Started</a>
      <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
    </div>
  </div>

</section>

@include($lang . "/pages/about")

@include($lang . "/pages/team")

@include($lang . "/pages/stats")

<!-- @include($lang . "/pages/services1") -->

<!-- @include($lang . "/pages/sponsors") -->

<!-- @include($lang . "/pages/features") -->

<!-- @include($lang . "/pages/services2") -->

<!-- @include($lang . "/pages/testimonials") -->

<!-- @include($lang . "/pages/portfolio") -->

@include($lang . "/pages/contactus")

</main>
@endsection