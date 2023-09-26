<?php include 'head/header.php';
if (!isset($_SESSION['is_login']) && $_SESSION == false) {
  header('Location:login.php');
}
if($_GET['id']==''){
  header('Location:events.php');
 }
 include ('config/db.php');
 $event_id= $_GET['id'];
 $sql = "SELECT * FROM events where event_id ='$event_id' ";
 $result = $conn->query($sql);
 $row = $result->fetch_assoc();

?>

<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
      <h2>Events Details</h2>
      <p>AMS streamlines event organization, communication, registration, networking, and adapts to evolving technology. </p>
    </div>
  </div><!-- End Breadcrumbs -->

  <!-- ======= Events Details Section ======= -->
  <section id="course-details" class="course-details">
    <div class="container" data-aos="fade-up">
      <div class="row">
        <div class="col-lg-8">
          <img src="upload_images/<?= $row['banner_image'] ?>" class="img-fluid" alt="">
          <h3><?=$row['event_title']?></h3>
          <p>
          <?=$row['description']?>
          </p>
        </div>
        <div class="col-lg-4">

          <div class="course-info d-flex justify-content-between align-items-center">
            <h5>Organizer</h5>
            <p><?=$row['organizer']?></p>
          </div>

          <div class="course-info d-flex justify-content-between align-items-center">
            <h5>Venue </h5>
            <p> <?=$row['venue']?>  </p>
          </div>

          <div class="course-info d-flex justify-content-between align-items-center">
            <h5>Type</h5>
            <p><?=$row['type']?></p>
          </div>

          <div class="course-info d-flex justify-content-between align-items-center">
            <h5>Scheduled Date</h5>
            <p><?=$row['date_and_time']?></p>
          </div>

        </div>
        <div class="col-lg-8">
          <h3> Are you willing to join the event?</h3>
          <p>
          <?=$row['join_event']?>
          </p>
        </div>

      </div>

    </div>
  </section><!-- End Events Details Section -->

</main><!-- End #main -->

<?php include 'head/footer.php'; ?>
