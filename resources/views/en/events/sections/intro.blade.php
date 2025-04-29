<style>
  #intro {
    background: url({{asset('storage/' . $event->cover)}}) top center;
    background-size: cover;
    --background-color: #000910;
  }
  #intro:before {
    content: "";
    background: color-mix(in srgb, #000910, transparent 30%);
    position: absolute;
    inset: 0;
  }
</style>

<section id="intro">
    <div class="intro-container wow fadeIn">
      <div class="py-4 px-5" style="">
        <h1 class="mb-4 pb-0"><span>{{explode(" ", $event->title, 2)[0]}}</span> {{explode(" ", $event->title, 2)[1]}}</h1>
        <h3 class="mb-4 pb-0">{{$event->subtitle}}</h3>
        <p class="mb-4 pb-0">{{$event->date}}, {{$event->venue}} - {{$event->city}}</p>
        @if ($event->registering == '1')
        <a data-bs-toggle="modal" data-bs-target="#exampleModalToggle2" href="#" class="about-btn scrollto">Register Now</a>
        @endif
        <a href="#about" class="about-btn scrollto">About The Event</a>
      </div>
    </div>
</section>