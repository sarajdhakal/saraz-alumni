<?php include 'head/header.php' ?>


  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Events</h2>
        <p>AMS streamlines event organization, communication, registration, networking, and adapts to evolving technology. </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-md-6 d-flex align-items-stretch">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/events-1.jpg" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="events-details.php">Introduction to webdesign</a></h5>
                <p class="fst-italic text-center">Sunday, September 26th at 7:00 pm</p>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
                <a href="events-details.php"> <h4>View Details</h4></a>
              </div>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-stretch">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/events-2.jpg" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="events-details.php">Marketing Strategies</a></h5>
                <p class="fst-italic text-center">Sunday, November 15th at 7:00 pm</p>
                <p class="card-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo</p>
                <a href="events-details.php"> <h4>View Details</h4></a>
                </div>
            </div>
          </div>

          <div id="foraa">
            <div class="container1">
              <h1 class="form-title">Add new Event
                <span class="close">&times;</span>
              </h1>
              <form action="#">
                  <div class="main-user-info">
                      <div class="user-input-box">
                          <label for="fullName"> Event Title</label>
                          <input type="text" id="fullName" name="fullName" placeholder="Event Title" required />
                      </div>
                      <div class="user-input-box">
                          <label for="username">Organizer</label>
                          <input type="text" id="username" name="username" placeholder="Organizer?" required />
                      </div>
                      <div class="user-input-box">
                          <label for="email">Venue</label>
                          <input type="email" id="email" name="email" placeholder="Venue" required />
                      </div>
                      <div class="user-input-box">
                          <label for="phoneNumber">Date</label>
                          <input type="datetime-local" id="phoneNumber" name="phoneNumber" required />
                      </div>
                      <div class="user-input-box">
                          <label for="textarea">Description of Event:</label>
                            <textarea id="w3review" name="" placeholder="Write a short description of your Event" rows="4" cols="50" required></textarea>
                      </div>
                      <div class="user-input-box">
                           <label for="imageInput">Bannner of your Event:</label>
                          <input type="file" id="imageInput" name="imageInput" accept="image/*">
                          <input type="submit" value="Upload">
                      </div>
                  </div>
                  <div class="form-submit-btn">
                      <input type="submit" value="Submit">
                  </div>
              </form>
          </div>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch text-center">
            <div class="member">
              <span id="boot-icon" class="bi bi-calendar-event" style="font-size:5rem"></span>
              <div class="member-content">
                <a href="#"> <h4>Add New Event</h4></a>
              </div>
            </div>
          </div>
          </div>
        </div>

      </div>
    </section><!-- End Events Section -->

  </main><!-- End #main -->

 <!-- ======= Footer ======= -->
 <footer id="footer">

  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-lg-3 col-md-6 footer-contact">
          <h3>Alumni Management System</h3>
          <p> Bharatpur- Chitwan <br><br>
            <strong>Phone:</strong>#<br>
            <strong>Email:</strong> hellohi@gmail.com<br>
          </p>
        </div>

        <div class="col-lg-2 col-md-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="about.php">About us</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="events.php">Events</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="container d-md-flex py-4">

    <div class="me-md-auto text-center text-md-start">
      <div class="copyright">
        &copy; Copyright <strong><span>Saraz</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/ -->
        Designed by <a href="#">Saraz Coorporation</a>
      </div>
    </div>
  </div>
</footer><!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>