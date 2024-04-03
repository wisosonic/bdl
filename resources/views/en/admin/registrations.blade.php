@extends($lang."/admin/base")

@section("content")
<link href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.css" rel="stylesheet">

<section id="speakers" class="wow fadeInUp">
    <div class="container">
        <div class="section-header">
          <h2>All Registrations</h2>
          <!-- <p>Here are some of our speakers</p> -->
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <h4 class="card-title"><b>Stats</b></h4>
                <div class="row">
                    <div class="col-md-3">
                        <h6 class="card-subtitle mb-2 text-body-secondary"><b>Total Registrations</b></h6>
                        <p class="card-text">
                            {{$all_registrations->count()}}
                        </p>
                    </div>
                    <div class="col-md-3">
                        <h6 class="card-subtitle mb-2 text-body-secondary"><b>Attending Lunch</b></h6>
                        <p class="card-text">
                            Yes: {{$all_registrations->where("attending", 1)->count()}}<br>
                            No: {{$all_registrations->where("attending", 0)->count()}}
                        </p>
                    </div>
                    <div class="col-md-3">
                        <h6 class="card-subtitle mb-2 text-body-secondary"><b>Clinic Location</b></h6>
                        <p class="card-text">
                            Beirut: {{$all_registrations->where("location", 1)->count()}}<br>
                            Other: {{$all_registrations->where("location", 0)->count()}}
                        </p>
                    </div>
                    <div class="col-md-3">
                        <h6 class="card-subtitle mb-2 text-body-secondary"><b>Present</b></h6>
                        <p class="card-text">
                            Yes: {{$all_registrations->where("presence", 1)->count()}}<br>
                            No: {{$all_registrations->where("presence", 0)->count()}}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <table id="registrationsTable" class="display">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Doctor Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>LDA ID</th>
                        <th>Lunch</th>
                        <th>Clinic location</th>
                        <th>Presence</th>
                        <th>Actions</th>
                    </tr>
                    <tr>
                        <td class='colsearch'></td>
                        <td class='colsearch'></td>
                        <td class='colsearch'></td>
                        <td class='colsearch'></td>
                        <td class='colsearch'></td>
                        <td class='colsearch'></td>
                        <td class='colsearch'></td>
                        <td class='colsearch'></td>
                        <td class='colsearch'></td>
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
                        @if ($value->presence)
                            <td>Yes</td>
                        @else
                            <td>No</td>
                        @endif
                        <td>
                            <a onclick="editRegistration({{$value->id}}); return false;" href="#" class="mx-2">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                            <a onclick="deleteRegistration({{$value->id}}); return false;" href="#" class="mx-2">
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

<script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js"></script>

<script>
    setTimeout(() => {
        document.getElementById("main").scrollIntoView({behavior: 'smooth'});
    }, 100);

    let table = new DataTable('#registrationsTable', {
        initComplete: function () {
            this.api()
            .columns()
            .every(function () {
                let column = this;
                let col_index = column.index()
                if (col_index > 0 && col_index < 7) {
                    // Create input element
                    let input = document.createElement('input');
                    document.getElementsByClassName('colsearch')[col_index].appendChild(input);
    
                    // Event listener for user input
                    input.addEventListener('keyup', () => {
                        if (column.search() !== this.value) {
                            column.search(input.value).draw();
                        }
                    });
                }
            });
        },
        lengthMenu: [10, 25, 50, { label: 'All', value: -1 }],
        layout: {
            top2Start: {
                buttons: [{ extend: 'excel', text: 'Export to Excel' }]
            }
        }
    });
    $("#registrationsTable_wrapper").css("width", "100%")
    $("#registrationsTable").css("width", "100%")
</script>
@endsection