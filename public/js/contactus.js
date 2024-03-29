function submitMessage() {

    var contact_name = $("#contact_name").val()
    var contact_email = $("#contact_email").val()
    var contact_subject = $("#contact_subject").val()
    var contact_message = $("#contact_message").val()

    if (contact_name && contact_email && contact_subject && contact_message) {
        $.post("/contact-us",
        {
            _token: _csrf_token,
            name: contact_name,
            email: contact_email,
            subject: contact_subject,
            message: contact_message
        },
        function(data, status){
            toastr["success"]("Your message has been sent. Thank you!")
        });
    } else {
        toastr["error"]("Please fill all the required fields")
    }

}