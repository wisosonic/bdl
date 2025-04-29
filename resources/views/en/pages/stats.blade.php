<!-- Stats Section -->
<section id="stats" class="stats section light-background">

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4">

      <div class="col-lg-3 col-md-6">
        <div class="stats-item d-flex align-items-center w-100 h-100">
          <i class="bi bi-emoji-smile color-blue flex-shrink-0"></i>
          <div>
            <span data-purecounter-start="0" data-purecounter-end="{{$members_count}}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Members</p>
          </div>
        </div>
      </div><!-- End Stats Item -->

      <div class="col-lg-3 col-md-6">
        <div class="stats-item d-flex align-items-center w-100 h-100">
          <i class="bi bi-journal-richtext color-orange flex-shrink-0"></i>
          <div>
            <span data-purecounter-start="0" data-purecounter-end="{{$events->count()}}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Events</p>
          </div>
        </div>
      </div><!-- End Stats Item -->

      <div class="col-lg-3 col-md-6">
        <div class="stats-item d-flex align-items-center w-100 h-100">
          <i class="bi bi-headset color-green flex-shrink-0"></i>
          <div>
            <span data-purecounter-start="0" data-purecounter-end="{{$registrations_count}}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Registrations</p>
          </div>
        </div>
      </div><!-- End Stats Item -->

      <div class="col-lg-3 col-md-6">
        <div class="stats-item d-flex align-items-center w-100 h-100">
          <i class="bi bi-people color-pink flex-shrink-0"></i>
          <div>
            <span data-purecounter-start="0" data-purecounter-end="{{$team->count()}}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Hard Workers</p>
          </div>
        </div>
      </div><!-- End Stats Item -->

    </div>

  </div>

</section><!-- /Stats Section -->