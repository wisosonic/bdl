@extends("en/pages/base-login")

@section("content")
<style>
    .hero {
        justify-content: right;
    }
    .hero:before {
        background: color-mix(in srgb, var(--background-color), transparent 70%);
    }
</style>
<main class="main">

<!-- Hero Section -->
<section id="hero" class="hero section dark-background">

  <img src="/img/site/backgrounds/login-background4.jpg" alt="" data-aos="fade-in">

    <form method="POST" action="{{ route('login') }}" id="login_form">

        <div class="container d-flex">
            @csrf
            <div data-aos="fade-up" data-aos-delay="100" class="card" style="width: 25rem; margin-right: 10rem">
                <div class="card-body my-5 mx-5">
                    <h5 class="card-title mb-4">Create New Account</h5>
                    <div data-aos="fade-up" data-aos-delay="100" class="mb-4">
                        <label for="exampleFormControlInput0" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleFormControlInput0" placeholder="Name">
                    </div>
                    <div data-aos="fade-up" data-aos-delay="100" class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div data-aos="fade-up" data-aos-delay="200" class="mb-4">
                        <label for="exampleFormControlInput2" class="form-label">Password</label>
                        <input type="password" name="password"  class="form-control" id="exampleFormControlInput2" placeholder="Password">
                    </div>
                    <div data-aos="fade-up" data-aos-delay="200" class="mb-4">
                        <label for="exampleFormControlInput3" class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation"  class="form-control" id="exampleFormControlInput3" placeholder="Confirm Password">
                    </div>
                    @if($errors->any())
                        @foreach($errors->getMessages() as $this_error)
                        <div id="passwordHelpBlock" class="form-text mb-4">
                            {{$this_error[0]}}
                        </div>
                        @endforeach
                    @endif
                    <div class="d-flex" data-aos="fade-up" data-aos-delay="300">
                        <a href="#" onclick="register()" class="btn-get-started me-2">Sign up</a>
                        <button type="button" onclick="window.location.replace('/login')" class="btn btn-outline-dark me-2">Log in</button>
                        <!-- <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a> -->
                    </div>
                </div>
            </div>
        </div>
    </form>

</section><!-- /Hero Section -->

</main>
<script src="/js/site/app.js"></script>
@endsection