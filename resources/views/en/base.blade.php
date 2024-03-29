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
  <link href="/css/fonts.css" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="/lib/animate/animate.min.css" rel="stylesheet">
  <link href="/lib/venobox/venobox.css" rel="stylesheet">
  <link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="/css/app.css" rel="stylesheet">
  <link href="/css/style.css" rel="stylesheet">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
  <link href="/css/jquery.sweet-modal.min.css" rel="stylesheet">

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

      @include($lang."/navbar")

    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  @include($lang."/sections/intro")

  <main id="main">

    <!--==========================
      About Section
    ============================-->
    @include($lang."/sections/about")

    <!--==========================
      Speakers Section
    ============================-->
    @include($lang."/sections/speakers")

    <!--==========================
      Schedule Section
    ============================-->
    @include($lang."/sections/schedule")

    <!--==========================
      Venue Section
    ============================-->
    <!-- @include($lang."/sections/venue") -->


    <!--==========================
      Gallery Section
    ============================-->
    <!-- @include($lang."/sections/gallery") -->

    <!--==========================
      Sponsors Section
    ============================-->
    @include($lang."/sections/sponsors")

    <!--==========================
      F.A.Q Section
    ============================-->
    <!-- @include($lang."/sections/faq") -->

    <!--==========================
      Subscribe Section
    ============================-->
    <!-- @include($lang."/sections/newsletters") -->

    <!--==========================
      Contact Section
    ============================-->
    <!-- @include($lang."/sections/contactus") -->

  </main>


  <!--==========================
    Footer
  ============================-->
  @include($lang."/sections/footer")

  @include($lang."/sections/registration")

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
  <script src="/js/jquery.sweet-modal.min.js"></script>

  <script src="/js/newsletter.js?version=5"></script>
  <script src="/js/registration.js?version=5"></script>
  <script src="/js/contactus.js?version=5"></script>
  <script>
    var _csrf_token = '{{csrf_token()}}'
  </script>
</body>

</html>
