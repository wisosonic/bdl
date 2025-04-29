@extends($lang . "/events/base")

@section("content")

<!--==========================
Intro Section
============================-->
@include($lang."/events/sections/intro")

<main id="main">

    <!--==========================
      About Section
    ============================-->
    @include($lang."/events/sections/abouts/about".$event->id)

    <!--==========================
      Speakers Section
    ============================-->
    @include($lang."/events/sections/speakers")

    <!--==========================
      Schedule Section
    ============================-->
    @include($lang."/events/sections/schedule")

    <!--==========================
      Venue Section
    ============================-->
    <!-- @include($lang."/events/sections/venus/venue".$event->id) -->


    <!--==========================
      Gallery Section
    ============================-->
    <!-- @include($lang."/events/sections/gallery") -->

    <!--==========================
      Sponsors Section
    ============================-->
    @include($lang."/events/sections/sponsors")

    <!--==========================
      F.A.Q Section
    ============================-->
    <!-- @include($lang."/events/sections/faq") -->

    <!--==========================
      Subscribe Section
    ============================-->
    <!-- @include($lang."/events/sections/newsletters") -->

    <!--==========================
      Contact Section
    ============================-->
    <!-- @include($lang."/events/sections/contactus") -->

</main>

@endsection