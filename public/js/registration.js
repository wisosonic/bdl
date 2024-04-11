function register() {
    var registration_name = $("#registration_name").val()
    var registration_phone = $("#registration_phone").val()
    var registration_lda_id = $("#registration_lda_id").val()
    var registration_email = $("#registration_email").val()
    var registration_attending = $('input[name="registration_attending"]:checked').val() 
    var registration_location = $('input[name="registration_location"]:checked').val()
    var registration_doctor = $('input[name="registration_doctor"]:checked').val()

    var phone_format = new RegExp('^(3|70|71|76|78|79|81)|(03|70|71|76|78|79|81)\d{6}$');
    registration_phone = registration_phone.replaceAll(" ", "")
    // if (registration_phone && ! phone_format.test(registration_phone)) {
    //     toastr["error"]("Please provide a valid phone number !")
    //     return false
    // } else {
    //     if(registration_phone.charAt(0) == "3") {
    //         registration_phone = "0" + registration_phone
    //     }
    // }

    if (
        registration_name && 
        registration_phone && 
        registration_attending && 
        registration_doctor && 
        ( (registration_doctor == 1 && registration_lda_id && registration_location) || registration_doctor == 0 ) 
    ) {
        $.post("/registration",
        {
            _token: _csrf_token,
            name: registration_name,
            phone: registration_phone,
            lda_id: registration_lda_id,
            location: registration_location ? registration_location : '',
            email: registration_email,
            attending: registration_attending,
            doctor: registration_doctor,
        }).done( function(data) {
            $('#exampleModalToggle2').modal('hide');
            $("#registration_name").val("")
            $("#registration_phone").val("")
            $("#registration_lda_id").val("")
            $("#registration_email").val("")
            $('input[name="registration_attending"]').prop('checked', false);
            $('input[name="registration_location"]').prop('checked', false);
            $('input[name="registration_doctor"]').prop('checked', false);
            setTimeout(() => {
                if (data.errors && data.errors.exists) {
                    toastr["warning"]("Your are already registered !")
                } else {
                    if (data.success) {
                        toastr["success"]("Your are successfuly registered to this event")
                    } else {
                        toastr["error"]("Something went wrong. Registration was not completed !")
                    }
                }
            }, 500);
        }).fail(function(data, status, errors) {
            data = data.responseJSON
            if (data.errors && data.errors.lda_id) {
                toastr["warning"]("Your are already registered !")
            }
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

$( document ).ready(function() {
    $( "input[name='registration_doctor']" ).on( "change", function() {
        var registration_doctor = $('input[name="registration_doctor"]:checked').val()
        $(".lda_id_div input").val("")
        $(".clinic_location_div input").prop('checked', false)
        if (registration_doctor == "1") {
            $(".lda_id_div").removeClass( "d-none" )
            $(".clinic_location_div").removeClass( "d-none" )
        } else {
            $(".lda_id_div").addClass( "d-none" )
            $(".clinic_location_div").addClass( "d-none" )
        }
    } );
});
 