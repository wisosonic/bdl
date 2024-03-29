<section id="venue" class="wow fadeInUp">

    <div class="container-fluid">

        <div class="section-header">
          <h2>Event Venue</h2>
          <p>Event venue location info and gallery</p>
        </div>

        <div class="row no-gutters">
          <div class="col-lg-6 venue-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3312.6536445033175!2d35.494386375708835!3d33.872815973225194!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151f1740ef2ed83b%3A0xf1ec1faedb96137f!2sBeirut%20Arab%20University!5e0!3m2!1sen!2slb!4v1710927432648!5m2!1sen!2slb" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>

          <div class="col-lg-6 venue-info">
            <div class="row justify-content-center">
              <div class="col-11 col-lg-8">
                <h3>Beirut Arab University</h3>
                <p class="mb-2">
                  <a href="https://www.bau.edu.lb/Beirut-Campus">website</a>
                </p>
                <p>
                  Beirut Campus was established in 1960. It is the main branch and located in 
                  the heart of Beirut in Tareek El Jadida. The land spans an area of 41,107 m2 
                  and comprises two buildings with a total built area 50,500 m2. The main building
                  has an area of 22,000 m2 and is utilized by BAU Administration and the Faculties 
                  of Business Administration and Dentistry.
                </p>
                <p>
                  There are a 300-seat festivities hall, five seminar rooms which are furnished 
                  and equipped with multimedia and display screens, a specially designed “Al Multaqa”, 
                  which is the Center for cultural and art activities, a Student Activities and Alumni & 
                  Career Office Building, a gymnasium, sports hall, and a cafeteria.
                </p>
                <p>
                  The second building is the 12-storie Hariri Building, with two basements and a ground floor. 
                  It is built on an area of 28,000 m2 and is comprised of five faculties: Human Sciences, 
                  Law and Political Science, Pharmacy, Medicine, and Health Sciences.
                </p>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="container-fluid venue-gallery-container">
        <div class="row no-gutters">

          @for($i=1; $i<=8; $i++)

            <div class="col-lg-3 col-md-4">
              <div class="venue-gallery">
                <a href="/img/venue-gallery/Beirut-{{$i}}.jpg" class="venobox" data-gall="venue-gallery">
                  <img src="img/venue-gallery/Beirut-{{$i}}.jpg" alt="" class="img-fluid">
                </a>
              </div>
            </div>

          @endfor

        </div>
    </div>

</section>