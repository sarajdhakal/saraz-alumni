<?php include 'head/header.php' ?>


  <main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <h2>Jobs</h2>
        <p>Alumni Management enhances job assurance by providing networking opportunities, job boards, mentorship, professional development, alumni events, and referral programs. </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Courses Section ======= -->
    <section id="courses" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="course-item">
              <img src="assets/img/course-1.jpg" class="img-fluid" alt="...">
              <div class="course-content">
                        <h3><a href="jobs-details.php">Website Design</a></h3>
                <p>Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.</p>
                <h6><em>Offered By : Organization Name</em></h6>
                <a href="jobs-details.php"> <h4>View Details</h4></a>
              </div>
            </div>
          </div> <!-- End Course Item-->
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="course-item">
              <img src="assets/img/course-2.jpg" class="img-fluid" alt="...">
              <div class="course-content">
                        <h3><a href="jobs-details.php">Search Engine Optimization</a></h3>
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
          
         
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch text-center">
            <div class="member">
              <span id="boot-icon" class="bi bi-briefcase" style="font-size:5rem"></span>
              <div class="member-content">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Offer A Job</button>                
              </div>
            </div>
          </div>
          </div>
        </div>
    </section><!-- End Courses Section -->

    <div class="modal fade-out" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Offer A Job</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="row g-3">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Job Title</label>
    <input type="text" class="form-control" id="inputEmail4" placeholder="Job Title">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Organization</label>
    <input type="text" class="form-control" id="inputPassword4" placeholder="Organization" required>
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Alumni Name</label>
    <input type="text" class="form-control" id="inputEmail4" placeholder="Alumni Name">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Due Date</label>
    <input type="date" class="form-control" id="inputPassword4" required>
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Description</label>
    <textarea class="form-control" rows="4" cols="50" placeholder="Description of Job"></textarea>
  </div>
  <div class="col-12">
    <label for="inputAddress2" class="form-label">Jobs Photo(Image Only)</label>
    <input type="file" class="form-control" id="inputimage" name="banner" accept="image/*">
  </div>
  </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>

  </main><!-- End #main -->

 <?php include('head/footer.php') ?>
