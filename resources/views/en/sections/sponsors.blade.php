<section id="sponsors" class="section-with-bg wow fadeInUp">

    <div class="container">
        <div class="section-header">
          <h2>Sponsors</h2>
        </div>

        

        <div class="row no-gutters sponsors-wrap clearfix d-flex justify-content-center">
          <!-- <div class="d-flex justify-content-center"> -->
            @foreach($platinum_sponsors as $sponsor)
              <div class="col-lg-5 col-md-4 col-xs-6">
                <div class="sponsor-logo sponsor-platinum gradient">
                  <a href="{{$sponsor->url}}">
                    <img src="/img/sponsors/new/{{$sponsor->photo}}" class="img-fluid" alt="{{$sponsor->name}}">
                    <div class="details">
                      <span class="badge badge-warning">♕ Platinum Sponsor</span>
                    </div>
                  </a>
                </div>
              </div>
              <!-- <sup><span class="badge badge-success">♛ Platinum Sponsor</span></sup> -->
              <!-- <span class="badge rounded-pill badge-notification bg-danger">10</span> -->
            @endforeach
          <!-- </div> -->
        </div>

        <div class="row no-gutters sponsors-wrap clearfix d-flex justify-content-center">
          <!-- <div class="d-flex justify-content-center"> -->
            @foreach($gold_sponsors as $sponsor)
              <div class="col-lg-3 col-md-4 col-xs-6">
                <div class="sponsor-logo">
                  <a href="{{$sponsor->url}}">
                    <img src="/img/sponsors/new/{{$sponsor->photo}}" class="img-fluid" alt="{{$sponsor->name}}">
                  </a>
                </div>
              </div>
            @endforeach
          <!-- </div> -->
        </div>

        <div class="row no-gutters sponsors-wrap clearfix d-flex justify-content-center">
          @foreach($regular_sponsors as $sponsor)
            <div class="col-lg-3 col-md-4 col-xs-6">
              <div class="sponsor-logo">
                <a href="{{$sponsor->url}}">
                  <img src="/img/sponsors/new/{{$sponsor->photo}}" class="img-fluid" alt="{{$sponsor->name}}">
                </a>
              </div>
            </div>
          @endforeach

        </div>

    </div>

</section>