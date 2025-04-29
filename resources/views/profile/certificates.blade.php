@extends($lang . "/pages/base")

@section("content")

<style>
  .sticky-top {
    z-index: 0;
  }
</style>

<main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade" style="background-image: url(/img/site/1580523-3840x2160-desktop-4k-beirut-wallpaper.jpg);">
      <div class="container position-relative">
        <h1>My Certificates</h1>
        <p>
            {{$user->name}}
        </p>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="/">Home</a></li>
            <li class="current">My Certificates</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Starter Section Section -->
    <section id="starter-section" class="starter-section section">

      <div class="container" data-aos="fade-up">
        <!-- Sidebar wrapper -->
        <div class="row">
          <!-- Sidebar you already have -->
          @include("profile.sidebar")

          <!-- Main content -->
          <main class="col-12 col-lg-9 col-xl-10 p-4">
            <div class="container section-title" data-aos="fade-up" style="padding-bottom: 0px">
              <h2>My Certificates</h2>
              <p><br></p>
            </div>
            <div class="container">
              <div class="row">

                <div class="col-md-12 mb-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Event Title</th>
                                <th scope="col">Date</th>
                                <th scope="col" class="text-center">Certificate</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($myevents as $key => $event)
                            <tr>
                                <td>{{$event->title}}</td>
                                <td>{{$event->date}}</td>
                                @if($event->pivot->certificate)
                                  <td class="text-center">
                                    <a href="{{ asset('storage/' . $event->pivot->certificate) }}" target="_blank">
                                      <i class="bi bi-download"></i></td>
                                    </a>
                                @else
                                  <td></td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>                  
                </div>

              </div>
            </div>
          </main>
          
        </div>
      </div>

    </section><!-- /Starter Section Section -->


</main>

@endsection