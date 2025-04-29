@extends($lang . "/pages/base")

@section("content")
<main class="main">

<!-- Page Title -->
<div class="page-title dark-background" data-aos="fade" style="background-image: url(/img/site/page-title-bg.webp);">
  <div class="container position-relative">
    <h1>BDL Members</h1>
    <p>Meet the members of our league who contribute to its mission and growth.</p>
    <nav class="breadcrumbs">
      <ol>
        <li><a href="/">Home</a></li>
        <li class="current">Members ({{$members->count()}})</li>
      </ol>
    </nav>
  </div>
</div><!-- End Page Title -->

<!-- Portfolio Details Section -->
<section id="portfolio-details" class="portfolio-details section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Name</th>
                    <th scope="col">Region</th>
                    <th scope="col">Street</th>
                    <th scope="col">Building</th>
                    <th scope="col">Floor</th>
                    <th scope="col">Landline</th>
                    <th scope="col">Mobile</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($members as $key => $member)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        @if($member->professor == 2)
                            <td>Dr.</td>
                        @elseif($member->professor == 4)
                            <td>Pr.</td>
                        @elseif($member->professor == 3)
                            <td>A. Pr.</td>
                        @endif
                        <td>{{$member->name}}</td>
                        <td>{{$member->region}}</td>
                        <td>{{$member->street}}</td>
                        <td>{{$member->building}}</td>
                        <td>{{$member->floor}}</td>
                        <td>{{($member->phone != '') ? sprintf('%08d', $member->phone) : ''}}</td>
                        <td>{{($member->mobile != '') ? sprintf('%08d', $member->mobile) : ''}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

</main>

@endsection