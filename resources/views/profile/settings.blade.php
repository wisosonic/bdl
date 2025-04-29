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
        <h1>My Settings</h1>
        <p>
            {{$user->name}}
        </p>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="/">Home</a></li>
            <li class="current">My Settings</li>
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
              <h2>Account Settings</h2>
              <p><br></p>
            </div>
            <div class="container">
              @if(Session::has('success'))
              <div class="alert alert-success" role="alert">
                Account Settings Updated Successfully
              </div>
              @elseif(Session::has('error'))
              <div class="alert alert-danger" role="alert">
                Account Settings Not Updated
              </div>
              @endif
              <div class="row">
                <form class="row g-3 needs-validation" novalidate method="POST" action="/profile/update-settings">
                  {{csrf_field()}}
                  <div class="col-md-12 mb-3">

                    <div class="row mb-4">
                      <div class="col-md-12 mb-3">
                        <label for="current_password" class="form-label">Current Password</label>
                        <input type="password" class="form-control" name="current_password" id="current_password" placeholder="Current Password" required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>
                      <div class="col-md-12 mb-3">
                        <label for="new_password" class="form-label">New Password</label>
                        <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password" required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>
                      <div class="col-md-12 mb-3">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                          <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                          <button type="button" class="btn btn-danger">Delete Account</button>
                        </div>                       
                      </div>
                    </div>
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