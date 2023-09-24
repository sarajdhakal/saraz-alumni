<?php 
include 'head/header.php' ;
if (!isset($_SESSION['is_login']) && $_SESSION == false) {
  header('Location:login.php');
}
if($_GET['id']==''){
 header('Location:jobs.php');
}
include ('config/db.php');
$job_id= $_GET['id'];
$sql = "SELECT * FROM jobs where job_id ='$job_id' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>


  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Jobs Details</h2>
        <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Cource Details Section ======= -->
    <section id="course-details" class="course-details">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-8">
            <img src="assets/img/course-details.jpg" class="img-fluid" alt="">
            <h3><?= $row["job_title"] ?></h3>
            <p>
            <?= $row["description"] ?>
            </p>
          </div>
          <div class="col-lg-4">

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Provider</h5>
              <p><a href="#"><?= $row["alumni_name"] ?> </a></p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Organization</h5>
              <p><?= $row["organization"] ?></p>
            </div>
            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Type</h5>
              <p><?= $row["type"] ?></p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Vacant Seats</h5>
              <p><?= $row["vacant_seats"] ?></p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Due Date to Apply</h5>
              <p><?= $row["due_date"] ?></p>
            </div>

          </div>
          <div class="col-lg-8">
            <h3>Required Qualification</h3>
            <p>
            <?= $row["qualification"] ?>
            </p>
          </div>
        </div>

      </div>
    </section><!-- End Cource Details Section -->

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
