@extends($lang."/admin/base")

@section("content")
<section id="speakers" class="wow fadeInUp">
    <div class="container">
        <div class="section-header">
          <h2>All Registrations</h2>
          <!-- <p>Here are some of our speakers</p> -->
        </div>

        <div class="row">
          <div class="col-md-12" style="text-align: right;">
            <button onclick="backToTable()" type="button" class="btn btn-primary mybutton">Back</button>
          </div>
          <div class="col-md-12">
              <input type="hidden" value="{{$registration->id}}" id="registration_id">
              <div class="mb-3">
                  <label for="registration_name" class="form-label">Name *</label>
                  <input type="text" class="form-control" placeholder="Your Name" id="registration_name" value="{{$registration->name}}">
              </div>
              <div class="mb-3">
                  <div class="input-group mb-3">
                      <label for="registration_phone" class="form-label">Phone Number *</label>
                      <div class="input-group">
                          <span class="input-group-text" id="basic-addon3">+961</span>
                          <input id="registration_phone" type="text" class="form-control" placeholder="Your Phone" aria-label="Your Phone" aria-describedby="basic-addon1" value="{{$registration->phone}}">
                      </div>
                  </div>
              </div>
              <div class="mb-3">
                  <label for="registration_email" class="form-label">Email address</label>
                  <input type="email" class="form-control" placeholder="name@example.com" id="registration_email" value="{{$registration->email}}">
              </div>
              <div class="mb-3">
                @if ($registration->doctor)
                  <label for="exampleFormControlInput6" class="form-label">Are you Doctor or Student ? *</label>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="registration_doctor" id="registration_attending_doctor" value="1" checked>
                      <label class="form-check-label" for="registration_attending_doctor">Doctor</label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="registration_doctor" id="registration_attending_student" value="0">
                      <label class="form-check-label" for="registration_attending_student">Student</label>
                  </div>
                @else
                <label for="exampleFormControlInput6" class="form-label">Are you Doctor or Student ? *</label>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="registration_doctor" id="registration_attending_doctor" value="1">
                      <label class="form-check-label" for="registration_attending_doctor">Doctor</label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="registration_doctor" id="registration_attending_student" value="0" checked>
                      <label class="form-check-label" for="registration_attending_student">Student</label>
                  </div>
                @endif
              </div>
              @if (! $registration->doctor)
                <div class="mb-3 lda_id_div d-none">
              @else 
                <div class="mb-3 lda_id_div">
              @endif
                  <label for="registration_lda_id" class="form-label">LDA ID *</label>
                  <input type="text" class="form-control" placeholder="Your LDA ID" id="registration_lda_id" value="{{$registration->lda_id}}">
              </div>
              @if (! $registration->doctor)
                <div class="mb-3 clinic_location_div d-none">
              @else 
                <div class="mb-3 clinic_location_div">
              @endif
                  <label for="exampleFormControlInput5" class="form-label">Clinic Location ? *</label>
                  @if ($registration->location)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="registration_location" id="registration_location_beirut" value="1" checked>
                        <label class="form-check-label" for="registration_location_beirut">Beirut</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="registration_location" id="registration_location_other" value="0">
                        <label class="form-check-label" for="registration_location_other">Other</label>
                    </div>
                  @else
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="registration_location" id="registration_location_beirut" value="1">
                        <label class="form-check-label" for="registration_location_beirut">Beirut</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="registration_location" id="registration_location_other" value="0" checked>
                        <label class="form-check-label" for="registration_location_other">Other</label>
                    </div>
                  @endif
              </div>
              <div class="mb-3">
                  <label for="exampleFormControlInput6" class="form-label">Are you interested in attending the lunch break ? *</label>
                  @if ($registration->attending)
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="registration_attending" id="registration_attending_yes" value="1" checked>
                      <label class="form-check-label" for="registration_attending_yes">Yes</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="registration_attending" id="registration_attending_no" value="0">
                      <label class="form-check-label" for="registration_attending_no">No</label>
                    </div>
                  @else
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="registration_attending" id="registration_attending_yes" value="1">
                      <label class="form-check-label" for="registration_attending_yes">Yes</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="registration_attending" id="registration_attending_no" value="0" checked>
                      <label class="form-check-label" for="registration_attending_no">No</label>
                    </div>
                  @endif
              </div>
              <div class="mb-3">
                  <label for="exampleFormControlInput6" class="form-label">Presence *</label>
                  @if ($registration->presence)
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="registration_presence" id="registration_presence_yes" value="1" checked>
                      <label class="form-check-label" for="registration_presence_yes">Yes</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="registration_presence" id="registration_presence_no" value="0">
                      <label class="form-check-label" for="registration_presence_no">No</label>
                    </div>
                  @else
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="registration_presence" id="registration_presence_yes" value="1">
                      <label class="form-check-label" for="registration_presence_yes">Yes</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="registration_presence" id="registration_presence_no" value="0" checked>
                      <label class="form-check-label" for="registration_presence_no">No</label>
                    </div>
                  @endif
              </div>
          </div>
          <div class="col-md-12">
          <button onclick="updateRegistration()" type="button" class="btn btn-primary mybutton">Save</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
    setTimeout(() => {
        document.getElementById("main").scrollIntoView({behavior: 'smooth'});
    }, 100);
</script>

  @endsection