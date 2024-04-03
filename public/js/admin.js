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
            location: registration_location,
            email: registration_email,
            attending: registration_attending,
            presence: registration_presence,
        },
        success: function (data, textStatus, xhr) {
            toastr["success"]("Registration updated successfuly !")
        },
        error: function (xhr, textStatus, errorThrown) {
            toastr["error"]("Error ! Registration not updated !")
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