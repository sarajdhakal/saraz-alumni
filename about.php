<?php include 'head/header.php';
include 'config/db.php';
$sql = "SELECT * FROM testimonials ";
$result = $conn->query($sql);


?>


  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>About Us</h2>
         <p>Our Alumni Management System is a comprehensive platform designed to foster meaningful connections and engagement with our esteemed alumni community. 
          We believe that the journey of education doesn't end at graduation; it's a lifelong bond that we cherish and nurture.</p>
      </div>
    </div><!-- End Breadcrumbs -->

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
             our platform enhances the alumni experience and strengthens the ties between graduates and our institution. 
             Join us in celebrating achievements, creating new memories, and shaping a brighter future together.
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

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Testimonials</h2>
          <p>What are they saying</p>
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
<?php
          if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){ ?>
            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
<<<<<<< HEAD
                  <img src="upload_images/<?= $row["testimonials_image"] ?>" class="testimonial-img" alt="">
=======
                  <img src="assets/img/2.png" class="testimonial-img" alt="">
>>>>>>> 8004df7c459c85877af7ab62734407b76bd21ca9
                  <h3><?= $row["testimonials_name"] ?></h3>
                  <h4><?= $row["post"] ?></h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    <?= $row["description"] ?>
<<<<<<< HEAD
=======
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->
  <?php  }
  }
        ?>  
        <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                  <h3>Samar Bhattarai</h3>
                  <h4>Founder</h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    The AMS fundraising capabilities enabled our institution to raise significant funds for scholarships and research projects.
                     It's an invaluable tool for engaging alumni in philanthropic initiatives and making a real impact.
>>>>>>> 8004df7c459c85877af7ab62734407b76bd21ca9
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->
  <?php  }
  }
        ?>  
       
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

  </main><!-- End #main -->

<<<<<<< HEAD
  <?php include('head/footer.php') ?>
=======
  <?php include('head/footer.php') ?>
>>>>>>> 8004df7c459c85877af7ab62734407b76bd21ca9
