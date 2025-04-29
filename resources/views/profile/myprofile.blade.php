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
        <h1>My Profile</h1>
        <p>
            {{$user->name}}
        </p>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="/">Home</a></li>
            <li class="current">My Profile</li>
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
              <h2>My Profile</h2>
              <p><br></p>
            </div>
            <div class="container">
              @if(Session::has('success'))
              <div class="alert alert-success" role="alert">
                User Profile Updated Successfully
              </div>
              @elseif(Session::has('error'))
              <div class="alert alert-danger" role="alert">
                User Profile Not Updated
              </div>
              @endif
              <div class="row">
                <form class="row g-3 needs-validation" novalidate method="POST" action="/profile/update-profile">
                  {{csrf_field()}}
                  <div class="col-md-6 mb-3">
                    <div class="row">
                      <div class="col-md-12 mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="John Doe" value="{{$user->name}}" required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                        <div class="invalid-feedback">
                          Please provide a valid name.
                        </div>
                      </div>
                      <div class="col-md-12 mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" value="{{$user->email}}" required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                        <div class="invalid-feedback">
                          Please provide a valid email address.
                        </div>
                      </div>
                      <div class="col-md-12 mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="+961 xx xx xx xx" value="{{$user->phone}}" required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                        <div class="invalid-feedback">
                          Please provide a valid phone number.
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 mb-3">
                    <div class="row">
                      <label for="doctor" class="form-label">Are you a Doctor ?</label>
                      <div class="col-md-12 mb-3">
                        <div class="form-check form-check-inline">
                          @if ($user->doctor == '1')
                          <input class="form-check-input" type="radio" name="doctor" id="doctor1" value="1" checked>
                          @else
                          <input class="form-check-input" type="radio" name="doctor" id="doctor1" value="1">
                          @endif
                          <label class="form-check-label" for="doctor1">
                            Doctor
                          </label>
                        </div>
                        <div class="form-check form-check-inline">
                          @if ($user->doctor != '1')
                          <input class="form-check-input" type="radio" name="doctor" id="doctor2" value="0" checked>
                          @else
                          <input class="form-check-input" type="radio" name="doctor" id="doctor2" value="0">
                          @endif
                          <label class="form-check-label" for="doctor2">
                            Student
                          </label>
                          <div class="invalid-feedback">Please choose an option</div>
                        </div>
                      </div>
                      <label for="location" class="form-label">Clinic Location</label>
                      <div class="col-md-12 mb-3">
                        <div class="form-check form-check-inline">
                          @if ($user->location == '1')
                          <input class="form-check-input" type="radio" name="location" id="location1" value="1" checked>
                          @else
                          <input class="form-check-input" type="radio" name="location" id="location1" value="1">
                          @endif
                          <label class="form-check-label" for="location1">
                            Beirut
                          </label>
                        </div>
                        <div class="form-check form-check-inline">
                          @if ($user->location != '1')
                          <input class="form-check-input" type="radio" name="location" id="location2" value="0" checked>
                          @else
                          <input class="form-check-input" type="radio" name="location" id="location2" value="10">
                          @endif
                          <label class="form-check-label" for="location2">
                            Other
                          </label>
                          <div class="invalid-feedback">Please choose an option</div>
                        </div>
                      </div>
                      <div class="col-md-12 mb-3">
                        <div class="mb-3">
                          <label for="lda_id" class="form-label">LDA ID</label>
                          <input type="text" class="form-control" name="lda_id" id="lda_id" placeholder="LDA ID" value="{{$user->lda_id}}" required>
                          <div class="invalid-feedback">
                            Please provide a valid LDA ID.
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-outline-danger">Save</button>
                  </div>
                </form>
              </div>
            </div>
          </main>
          
        </div>
      </div>

    </section><!-- /Starter Section Section -->


</main>

<script>
  (() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
</script>

@endsection