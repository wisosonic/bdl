<section id="schedule" class="section-with-bg">
    <div class="container wow fadeInUp">
        <div class="section-header">
          <h2>Event Schedule</h2>
          <!-- <p>Here is our event schedule</p> -->
        </div>

        <!-- <ul class="nav nav-tabs" role="tablist">
        @foreach ($all_timeslots as $day => $value)
          <li class="nav-item">
            <a class="nav-link {{ ($day == 1) ? 'active' : '' }}" href="#day-{{$day}}" role="tab" data-toggle="tab">Day {{$day}}</a>
          </li>
        @endforeach
        </ul> -->

        <div class="tab-content row justify-content-center">
          @foreach ($all_timeslots as $day => $timeslots)
          <div role="tabpanel" class="col-lg-9 tab-pane fade show {{ ($day == 1) ? 'active' : '' }}" id="day-{{$day}}">
            @foreach($timeslots as $timeslot)
              @if ($timeslot->type == 'break')
              <div class="row schedule-item">
                <div class="col-md-2"><time>{{$timeslot->start}}<br>{{$timeslot->end}}</time></div>
                <div class="col-md-10">
                  <h4>{{$timeslot->title}}</h4>
                  <!-- @if($timeslot->quote)
                    @if(str_contains($timeslot->quote, "-"))
                      <p>&#8220;{{explode("-", $timeslot->quote)[0]}}&#8220;</p>
                      <figcaption class="blockquote-footer">
                        {{explode("-", $timeslot->quote)[1]}}
                      </figcaption>
                    @else
                      <p>&#8220;{{$timeslot->quote}}&#8220;</p>
                    @endif
                  @else
                    <p></p>
                  @endif -->
                  <p></p>
                </div>
              </div>
              @elseif ($timeslot->type == 'lecture')
              <div class="row schedule-item">
                <div class="col-md-2"><time>{{$timeslot->start}}<br>{{$timeslot->end}}</time></div>
                <div class="col-md-10">
                  <div class="speaker">
                    <img src="/img/speakers/new/{{$timeslot->lecture()->first()->speaker()->first()->photo}}" alt="Brenden Legros">
                  </div>
                  <h4>{{$timeslot->lecture()->first()->speaker()->first()->name}} <span style="font-size:14px">{{$timeslot->lecture()->first()->speaker()->first()->speciality}}</span></h4>
                  <p><b>{{$timeslot->lecture()->first()->title}}</b></p>
                </div>
              </div>
              @endif
            @endforeach
          </div>
          @endforeach
        </div>
    </div>
</section>