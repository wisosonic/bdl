<section id="subscribe">
    <div class="container wow fadeInUp">
        <div class="section-header">
          <h2>Newsletter</h2>
          <p>
            Want to be the first to hear about upcoming editions, event updates and more? 
            Subscribe to the newsletter to make sure you don't 
            miss out on anything. See you at the next edition!.
          </p>
        </div>

        <form method="POST" action="">
          {{ csrf_field() }}
          <div class="form-row justify-content-center">
            <div class="col-auto">
              <input type="text" class="form-control" id="newsletter_email" name="email" placeholder="Enter your Email">
            </div>
            <div class="col-auto">
              <button id="newsletter_submit" onclick="return false" type="submit">Subscribe</button>
            </div>
          </div>
        </form>

    </div>
</section>