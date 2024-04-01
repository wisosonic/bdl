function register() {
    var registration_name = $("#registration_name").val()
    var registration_phone = $("#registration_phone").val()
    var registration_lda_id = $("#registration_lda_id").val()
    var registration_email = $("#registration_email").val()
    var registration_attending = $('input[name="registration_attending"]:checked').val()
    var registration_location = $('input[name="registration_location"]:checked').val()

    var phone_format = new RegExp('^(3|70|71|76|78|79|81)|(03|70|71|76|78|79|81)\d{6}$');
    registration_phone = registration_phone.replaceAll(" ", "")
    if (registration_phone && ! phone_format.test(registration_phone)) {
        toastr["error"]("Please provide a valid phone number !")
        return false
    } else {
        if(registration_phone.charAt(0) == "3") {
            registration_phone = "0" + registration_phone
        }
    }

    if (registration_name && registration_phone && registration_lda_id && registration_attending) {
        $.post("/registration",
        {
            _token: _csrf_token,
            name: registration_name,
            phone: registration_phone,
            lda_id: registration_lda_id,
            location: registration_location,
            email: registration_email,
            attending: registration_attending,
        },
        function(data, status){
            $('#exampleModalToggle2').modal('hide');
            $("#registration_name").val("")
            $("#registration_phone").val("")
            $("#registration_lda_id").val("")
            $("#registration_email").val("")
            $('input[name="registration_attending"]').prop('checked', false);
            $('input[name="registration_location"]').prop('checked', false);
            setTimeout(() => {
                if (data.exists) {
                    toastr["warning"]("Your are already registered !")
                } else {
                    if (data.success) {
                        toastr["success"]("Your are successfuly registered to this event")
                    } else {
                        toastr["error"]("Something went wrong. Registration was not completed !")
                    }
                }
            }, 500);

        });
    } else {
        toastr["error"]("Please fill all the required fields")
    }

}

$( "#registration_phone" ).on( "keypress", function(evt) {
    Code = evt.originalEvent.charCode
    if (Code > 32 && (Code < 48 || Code > 57))
        return false;
    return true;
} );
$('#registration_phone').on("cut copy paste",function(e) {
    e.preventDefault();
 });
$( "#registration_lda_id" ).on( "keypress", function(evt) {
    Code = evt.originalEvent.charCode
    if (Code > 31 && (Code < 48 || Code > 57))
        return false;
    return true;
} );
$('#registration_lda_id').on("cut copy paste",function(e) {
    e.preventDefault();
 });