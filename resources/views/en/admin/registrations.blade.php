@extends($lang."/admin/base")

@section("content")
<section id="speakers" class="wow fadeInUp">
    <div class="container">
        <div class="section-header">
          <h2>All Registrations</h2>
          <!-- <p>Here are some of our speakers</p> -->
        </div>

        <div class="row">
            <table style="width:100%" id="registrationsTable" class="display">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Doctor Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>LDA ID</th>
                        <th>Lunch</th>
                        <th>Clinic location</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($all_registrations as $key => $value)
                <tr>
                    <td>{{$value->created_at}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->phone}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{$value->lda_id}}</td>
                    @if ($value->attending)
                        <td>Yes</td>
                    @else
                        <td>No</td>
                    @endif
                    @if ($value->location)
                        <td>Beirut</td>
                    @else
                        <td>Other</td>
                    @endif
                    <td>
                        <a onclick="editRegistration({{$value->id}}); return false;" href="#" class="mx-2">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                        <a onclick="deleteRegistration({{$value->id}}); return false;" href="#">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

<script>
    setTimeout(() => {
        document.getElementById("main").scrollIntoView({behavior: 'smooth'});
    }, 100);

    let table = new DataTable('#registrationsTable', {
        // config options...
    });
</script>
@endsection