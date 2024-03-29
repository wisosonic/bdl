$("#newsletter_submit").on("click", function (){
    $.post("/newsletter",
    {
        _token: _csrf_token,
        email: $("#newsletter_email").val()
    },
    function(data, status){
        toastr["success"]("Your email address is successfuly registered to our Newsletter")
    });
})