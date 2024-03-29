<section id="sponsors" class="section-with-bg wow fadeInUp">

    <div class="container">
        <div class="section-header">
          <h2>Sponsors</h2>
        </div>

        <div class="row no-gutters sponsors-wrap clearfix">

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="sponsor-logo">
              <img src="img/sponsors/1.png" class="img-fluid" alt="">
            </div>
          </div>

          @foreach($all_sponsors as $sponsor)
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