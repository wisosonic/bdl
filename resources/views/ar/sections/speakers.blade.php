<section id="speakers" class="wow fadeInUp">
    <div class="container">
        <div class="section-header">
          <h2>Event Speakers</h2>
          <p>Here are some of our speakers</p>
        </div>

        <div class="row">

          @foreach($all_speakers as $speaker)
            @if ($speaker->professor > 0)
              <div class="col-lg-4 col-md-6">
                <div class="speaker">
                  <img src="/img/speakers/new/{{$speaker->photo}}" alt="Speaker 1" class="img-fluid">
                  <div class="details">
                    <h3>
                      <a href="speaker-details.html">
                        @if ($speaker->professor == 1) 
                          Mr.
                        @elseif ($speaker->professor == 2) 
                          Dr.
                        @elseif ($speaker->professor == 3) 
                          A. Pr.
                        @else
                          Pr.
                        @endif
                        {{$speaker->name}}
                      </a>
                    </h3>
                    <p>{{$speaker->speciality}}</p>
                    <div class="social">
                      <a href=""><i class="fa fa-twitter"></i></a>
                      <a href=""><i class="fa fa-facebook"></i></a>
                      <a href=""><i class="fa fa-google-plus"></i></a>
                      <a href=""><i class="fa fa-linkedin"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            @endif
          @endforeach
          
        </div>
    </div>

</section>