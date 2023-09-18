<?php include 'head/header.php';
<<<<<<< HEAD

include 'config/db.php';
$sql = "SELECT * FROM jobs ";
$result = $conn->query($sql);

=======
session_start();
include 'config/db.php';
$sql = "SELECT * FROM jobs ";
$result = $conn->query($sql);

>>>>>>> 8004df7c459c85877af7ab62734407b76bd21ca9
?>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
      <h1>Welcome to <br>Alumni Management System</h1>
      <h2>Alumni are ambassadors of an institution, spreading its reputation far and wide through their achievements and contributions.</h2>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2"  data-aos-delay="100">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>Empowering alumni, inspiring success.</h3>
            <p class="fst-italic">
              We're here to connect, engage, and support our alumni community. From tracking alumni data to organizing events and fostering mentorship opportunities,
             our platform enhances the alumni experience and strengthens the ties between graduates and our institution. Join us in celebrating achievements, creating new memories, and shaping a brighter future together.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> Connect with alumni</li>
              <li><i class="bi bi-check-circle"></i> Get Job Opportunities</li>
              <li><i class="bi bi-check-circle"></i> Host and Join Events</li>
            </ul>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->
    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>Why Choose Alumni Management System?</h3>
              <p>
               This system establish communication, enhance job opportunities and strengthen the bond between institution and its graduates.
                 With features such as event management, mentoring support, this system empowers institutions to engage and connect with their alumni community effectively.
              </p>
              <div class="text-center">
                <a href="about.php" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4>Events</h4>
                    <p> Organizing events becomes seamless. 
                      Enables institutions to efficiently plan and execute reunions, networking events, career fairs, and more, keeping alumni engaged and connected.</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-briefcase-alt"></i>
                    <h4>Job Opportunities</h4>
                    <p>Unlock a world of job opportunities for alumni, providing a platform that facilitates seamless networking, career support, and access to exclusive job postings.</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-images"></i>
                    <h4>Alumni Gatherings</h4>
                    <p>The planning and coordination of memorable alumni gatherings, fostering meaningful connections and unforgettable experiences.</p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Jobs Section ======= -->
    <section id="popular-courses" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Jobs</h2>
          <p>Availbale Jobs</p>
        </div>

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
           <!-- <JOB ITEMS> -->

           <?php 
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){ ?>
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
          <div class="course-item">
            <img src="assets/img/course-1.jpg" class="img-fluid" alt="...">
            <div class="course-content">
              <h3><?= $row["job_title"] ?></h3>
              <p><?= $row["description"] ?></p>
              <h6><em>Offered By :<?= $row["organization"] ?></em></h6>
              <?php 
                 if(!isset($_SESSION['is_login'])){?>
                   <a href="login.php"><h4>View Details</h4></a>
                <?php }
                 else
                 {?>   
                   <a href="jobs-details.php"><h4>View Details</h4></a>
                 <?php } ?>
              </a>
            </div>
          </div>
        </div> 
        <?php } 
        }
        ?>
        
<!-- End Course Item-->
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="course-item">
              <img src="assets/img/course-2.jpg" class="img-fluid" alt="...">
              <div class="course-content">
                        <h3>Search Engine Optimization</h3>
                <p>Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.</p>
                <h6><em>Offered By : Organization Name</em></h6>
                <a href="jobs-details.php"> <h4>View Details</h4></a>
              </div>
            </div>
          </div> <!-- End Course Item-->
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="course-item">
              <img src="assets/img/course-3.jpg" class="img-fluid" alt="...">
              <div class="course-content">
                             <h3><a href="jobs-details.php">Copywriting</a></h3>
                <p>Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.</p>
                <h6><em>Offered By : Organization Name</em></h6>
                <a href="jobs-details.php"> <h4>View Details</h4></a>
              </div>
            </div>
          </div> <!-- End Course Item-->
        </div>

      </div>
    </section><!-- End Popular Courses Section -->



    <section id="popular-courses" class="courses">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Events</h2>
          <p>Upcoming Events</p>
        </div>

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

         
        </div>

      </div>
    </section><!-- End Events Section -->
      </div>
    </section><!-- End Popular Courses Section -->
  </main><!-- End #main -->

  <?php include 'head/footer.php' ?>
 
