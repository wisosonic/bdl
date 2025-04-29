<!-- Modal -->
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <input type="hidden" class="form-control" id="event_id" value="{{$event->id}}">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel2"><b>{{$event->title}} Registration</b></h1>
      </div>
      <div class="modal-body">
        <div class="mb-3">
            <label for="registration_name" class="form-label">Name *</label>
            <input type="text" class="form-control" placeholder="Your Name" id="registration_name">
        </div>
        <div class="mb-3">
          <div class="input-group mb-3">
          <label for="registration_phone" class="form-label">Phone Number *</label>
          <div class="input-group">
            <!-- <span class="input-group-text" id="basic-addon3">+961</span> -->
            <span class="input-group-text px-1" id="basic-addon3">
              <img src="/icons/leb.svg" alt="Logo" class="mx-1">  
              +961
            </span>
            <input id="registration_phone" type="text" class="form-control" placeholder="Your Phone" aria-label="Your Phone" aria-describedby="basic-addon1">
          </div>
        </div>
        <div class="mb-3">
            <label for="registration_email" class="form-label">Email address</label>
            <input type="email" class="form-control" placeholder="name@example.com" id="registration_email">
        </div>
        
        <div class="mb-3">
            <label for="exampleFormControlInput6" class="form-label">Are you Doctor or Student ? *</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="registration_doctor" id="registration_attending_doctor" value="1">
                <label class="form-check-label" for="registration_attending_doctor">Doctor</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="registration_doctor" id="registration_attending_student" value="0">
                <label class="form-check-label" for="registration_attending_student">Student</label>
            </div>
        </div>
        
        <div class="mb-3 lda_id_div d-none">
            <label for="registration_lda_id" class="form-label">LDA ID *</label>
            <input type="text" class="form-control" placeholder="Your LDA ID" id="registration_lda_id">
        </div>
        <div class="mb-3 clinic_location_div d-none">
            <label for="exampleFormControlInput5" class="form-label">Clinic Location ? *</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="registration_location" id="registration_location_beirut" value="1">
                <label class="form-check-label" for="registration_location_beirut">Beirut</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="registration_location" id="registration_location_other" value="0">
                <label class="form-check-label" for="registration_location_other">Other</label>
            </div>
        </div>
        <div class="mb-3">
            <!-- <span class="text-warning"> Sorry! All the places are reserved for the lunch </span><br> -->
            <label for="exampleFormControlInput6" class="form-label">Are you interested in attending the lunch break ? *</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="new_registration_attending" id="registration_attending_yes" value="1">
                <label class="form-check-label" for="registration_attending_yes">Yes</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="new_registration_attending" id="registration_attending_no" value="0">
                <label class="form-check-label" for="registration_attending_no">No</label>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" onclick="register()">Register</button>
      </div>
    </div>
  </div>
</div>