function backToTable() {
    window.location.replace("/admin-panel/registrations/")
}

function editRegistration(id){
    window.location.replace("/admin-panel/registrations/"+id)
}

function updateRegistration() {
    var registration_id = $("#registration_id").val()
    var registration_name = $("#registration_name").val()
    var registration_phone = $("#registration_phone").val()
    var registration_lda_id = $("#registration_lda_id").val()
    var registration_email = $("#registration_email").val()
    var registration_attending = $('input[name="registration_attending"]:checked').val()
    var registration_location = $('input[name="registration_location"]:checked').val()
    var registration_presence = $('input[name="registration_presence"]:checked').val()
    var registration_doctor = $('input[name="registration_doctor"]:checked').val()

    $.ajax({
        url: "/admin-panel/registrations/"+registration_id,
        type: 'PUT',
        dataType: 'json',
        data: {
            _token: _csrf_token,
            id: registration_id,
            name: registration_name,
            phone: registration_phone,
            lda_id: registration_lda_id,
            location: registration_location ? registration_location : '',
            email: registration_email,
            attending: registration_attending,
            presence: registration_presence,
            doctor: registration_doctor,
        },
        success: function (data, textStatus, xhr) {
            toastr["success"]("Registration updated successfuly !")
        },
        error: function (xhr, textStatus, errorThrown) {
            data = xhr.responseJSON
            if (data.errors && data.errors.lda_id) {
                toastr["warning"]("Your are already registered !")
            } else {
                toastr["error"]("Error ! Registration not updated !")
            }
        }
    });
}

function deleteRegistration(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/admin-panel/registrations/delete",
                type: 'delete',
                dataType: 'json',
                data: {
                    _token: _csrf_token,
                    id: id
                },
                success: function (data, textStatus, xhr) {
                    toastr["success"]("Registration deleted successfuly !")
                    setTimeout(() => {
                        window.location.reload()
                    }, 1000);
                },
                error: function (xhr, textStatus, errorThrown) {
                    toastr["error"]("Error ! Registration not deleted !")
                }
            });
        }
      });
}

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