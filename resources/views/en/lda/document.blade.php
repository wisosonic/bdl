@extends($lang . "/pages/base")

@section("content")

<main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade" style="background-image: url(/img/site/1580523-3840x2160-desktop-4k-beirut-wallpaper.jpg);">
      <div class="container position-relative">
        <h1>LDA Foundation</h1>
        <p>
            The Lebanese Dental Association
        </p>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="/">Home</a></li>
            <li class="current">LDA</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Starter Section Section -->
    <section id="starter-section" class="starter-section section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Lebanese Dental Association</h2>
        <p>{{$document->title}}<br></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up">
        <embed src="{{asset('storage/' . $document->url)}}" type="application/pdf" style="width: 100%; height: 1200px;">
      </div>

    </section><!-- /Starter Section Section -->

</main>

@endsection