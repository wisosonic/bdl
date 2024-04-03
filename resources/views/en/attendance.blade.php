<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>27th Annual Scientific Day</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="/img/favicon.png" rel="icon">
  <link href="/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="/css/fonts.css?version=8" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="/lib/bootstrap/css/bootstrap.min.css?version=8" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="/lib/font-awesome/css/font-awesome.min.css?version=8" rel="stylesheet">
  <link href="/lib/animate/animate.min.css?version=8" rel="stylesheet">
  <link href="/lib/venobox/venobox.css?version=8" rel="stylesheet">
  <link href="/lib/owlcarousel/assets/owl.carousel.min.css?version=8" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="/css/app.css?version=8" rel="stylesheet">
  <link href="/css/style.css?version=8" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css?version=8" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
  <link href="/css/jquery.sweet-modal.min.css?version=8" rel="stylesheet">

  <!-- =======================================================
    Theme Name: TheEvent
    Theme URL: https://bootstrapmade.com/theevent-conference-event-bootstrap-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <!-- Uncomment below if you prefer to use a text logo -->
        <!-- <h1><a href="#main">C<span>o</span>nf</a></h1>-->
        <a href="#intro" class="scrollto"><img src="img/logo.png" alt="" title=""></a>
      </div>

    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div class="intro-container wow fadeIn">
        <h1 class="mb-4 pb-0"><br><span>27th </span> Annual Scientific Day</h1>
        <div class="input-group mb-3" style="width: 50%;">
            <input name="lda_id" id="lda_id"  type="text" class="form-control mx-2" placeholder="LDA ID" aria-label="LDA ID" aria-describedby="button-addon2">
            <button onclick="confirmPresence();" class="about-btn attendance" type="button" id="button-addon2" style="margin: 0px;">
                <div id="confirmation_spinner" class="spinner-border spinner-border-sm visually-hidden" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div>
                <i id="confirmation_icon" class="fa-solid fa-circle-check visually-hidden" style="font-size:20px !important"></i>
                Confirm Presence
            </button>
        </div>
    </div>
  </section>

  <main id="main">

  </main>

  <!--==========================
    Footer
  ============================-->
  @include($lang."/sections/footer")

  <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="/lib/jquery/jquery.min.js"></script>
  <script src="/lib/jquery/jquery-migrate.min.js"></script>
  <script src="/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/lib/easing/easing.min.js"></script>
  <script src="/lib/superfish/hoverIntent.js"></script>
  <script src="/lib/superfish/superfish.min.js"></script>
  <script src="/lib/wow/wow.min.js"></script>
  <script src="/lib/venobox/venobox.min.js"></script>
  <script src="/lib/owlcarousel/owl.carousel.min.js"></script>
  
  <!-- Contact Form JavaScript File -->
  <script src="/contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="/js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" crossorigin="anonymous"></script>
  <script src="/js/jquery.sweet-modal.min.js"></script>

  <script src="/js/newsletter.js?version=8"></script>
  <script src="/js/registration.js?version=8"></script>
  <script src="/js/contactus.js?version=8"></script>
  <script>
    var _csrf_token = '{{csrf_token()}}'

    $( "#lda_id" ).on( "keypress", function(evt) {
        Code = evt.originalEvent.charCode
        if (Code > 31 && (Code < 48 || Code > 57))
            return false;
        return true;
    } );
    $('#lda_id').on("cut copy paste",function(e) {
        e.preventDefault();
    });

    function confirmPresence() {
      let lda_id = $("#lda_id").val()
      if (lda_id) {
        $.post("/attendance",
        {
            _token: _csrf_token,
            lda_id: lda_id,
        },
        function(data, status){
          console.log(data.confirmed)
          if (data.confirmed) {
            toastr["success"]("Welcome Dr. " + data.registration.name + " !")
          } else {
            toastr["error"]("The provided LDA ID not found !")
          }
        })
      } else {
        toastr["error"]("Please enter a valid LDA ID")
      }
    }
  </script>
</body>

</html>
