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
    <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="container">
      <h2>Jobs Details</h2>
      <p>Alumni Management enhances job assurance by providing networking opportunities, job boards,
        mentorship, professional development, alumni events and referral programs. </p>
    </div>
  </div><!-- End Breadcrumbs -->

    <!-- ======= Cource Details Section ======= -->
    <section id="course-details" class="course-details">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-8">
            <img src="upload_images/<?=$row['banner_image']?>" class="img-fluid" alt="">
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
 <?php include('head/footer.php'); ?>