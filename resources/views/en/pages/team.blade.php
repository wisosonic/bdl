<!-- Team Section -->
<section id="team" class="team section light-background">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Team</h2>
    <p>CHECK OUR TEAM</p>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="row gy-5">
    
    @foreach($team as $member)
      <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="member">
          @if($member->photo != '')
            <div class="pic"><img src="{{asset('storage/' . $member->photo)}}" class="img-fluid" alt=""></div>
          @else
            <div class="pic"><img src="/img/site/team/team-1.jpg" class="img-fluid" alt=""></div>
          @endif
          <div class="member-info">
            <h4>
                @if($member->professor == '2')
                    Dr.
                @elseif ($member->professor == '3')
                    A. Pr.
                @elseif ($member->professor == '4')
                    Pr.
                @endif
                {{$member->name}}
            </h4>
            <span>{{$member->position}} - {{$member->phone}}</span>
            <!-- <div class="social">
              <a href="{{$member->x}}"><i class="bi bi-twitter-x"></i></a>
              <a href="{{$member->facebook}}"><i class="bi bi-facebook"></i></a>
              <a href="{{$member->instagram}}"><i class="bi bi-instagram"></i></a>
              <a href="{{$member->linkedin}}"><i class="bi bi-linkedin"></i></a>
            </div> -->
          </div>
        </div>
      </div><!-- End Team Member -->
    @endforeach

    </div>

  </div>

</section><!-- /Team Section -->