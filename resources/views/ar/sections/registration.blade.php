<!-- Modal -->
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel"><b>27th Annual Scientific Day Registration</b></h1>
      </div>
      <div class="modal-body">
            <b>Under the patronage of Professor Ronald Youness - President of the Lebanese Dental Association</b> <br>
            <br>
            <b>Date</b>: April 21, 2024 <br>
            <b>Timing</b>: 8:30 AM - 05:00 PM <br>
            <b>Address</b>: Beirut Arab University - Hariri Building <br>
            <br>
            For more info : <br>
            Dr Nizar Kadi: 03 616 926 <br>
            Dr Samer Hout: 03 809 350 <br>
            <br>
            <b>- Free Registration -</b>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Next</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel2"><b>27th Annual Scientific Day Registration</b></h1>
      </div>
      <div class="modal-body">
        <div class="mb-3">
            <label for="registration_name" class="form-label">Doctor Name *</label>
            <input type="text" class="form-control" placeholder="Your Name" id="registration_name">
        </div>
        <div class="mb-3">
            <label for="registration_phone" class="form-label">Phone Number *</label>
            <input type="text" class="form-control" placeholder="Your Phone" id="registration_phone">
        </div>
        <div class="mb-3">
            <label for="registration_lda_id" class="form-label">Doctor's LDA ID *</label>
            <input type="text" class="form-control" placeholder="Your LDA ID" id="registration_lda_id">
        </div>
        <div class="mb-3">
            <label for="registration_email" class="form-label">Email address</label>
            <input type="email" class="form-control" placeholder="name@example.com" id="registration_email">
        </div>
        <div class="mb-3">
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
            <label for="exampleFormControlInput6" class="form-label">Are you interested in attending the lunch break ? *</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="registration_attending" id="registration_attending_yes" value="1">
                <label class="form-check-label" for="registration_attending_yes">Yes</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="registration_attending" id="registration_attending_no" value="0">
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