<section id="intro" class="section-bg wow fadeInUp">
  <div class="container">
    <div class="intro-container wow fadeIn">
      <h1 class="mb-4 pb-0"><br>All registrations</h1>
      <div style="background-color:white;" class="row">
        <div class="col-md-12">
          <table style="width:100%" id="myTable" class="display">
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
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>