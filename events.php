<?php
session_start();
include 'head/header.php';
include 'config/db.php';

$todayDate = date("Y-m-d");
$sql = "SELECT * FROM events WHERE date_and_time >= '$todayDate'";
$result = $conn->query($sql);
$error_message1 = 'Error';
$flag = 0;
function validate_form($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_POST) {
  $event_title = validate_form($_POST['event_title']);
  $organizer = validate_form($_POST['organizer']);
  $organizer_email = validate_form($_POST['organizer_email']);
  $type = validate_form($_POST['type']);
  $venue = validate_form($_POST['venue']);
  $date_and_time = validate_form($_POST['date_and_time']);
  $description = validate_form($_POST['description']);
  $join_event = validate_form($_POST['join_event']);
  $banner_image = $_FILES['banner_image']['name'];
  move_uploaded_file($_FILES['banner_image']['tmp_name'], "upload_images/$banner_image");
  if ($banner_image === '') {
    $banner_image = $row["banner_image"];
  }
  if ($flag == 0) {
    $sql2 = "INSERT INTO events (event_title, organizer,organizer_email,type,venue,date_and_time, description,join_event,banner_image) 
         VALUES ('$event_title','$organizer','$organizer_email','$type','$venue','$date_and_time','$description','$join_event','$banner_image')";
    if ($conn->query($sql2) === true) {
      $flag = 2;
      $error_message1 = 'Event added successfully.';
    } else {
      echo "Error: " . $sql2 . "<br>" . $conn->error;
    }
  }
}
?>



<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
      <h2>Events</h2>
      <p>AMS streamlines event organization, communication, registration, networking, and adapts to evolving technology. </p>
    </div>
  </div><!-- End Breadcrumbs -->
  <?php
  if ($flag == 2) {
  ?>
    <div class="alert alert-success " role="alert">
      <?php echo $error_message1; ?>
    </div>
  <?php
  } else if ($flag == 1) {
  ?>
    <div class="alert alert-danger p-1 text-danger" role="alert">
      <?php echo $error_message1; ?>
    </div>
  <?php
  }
  ?>
  <!-- ======= Events Section ======= -->
  <section id="events" class="events">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <?php
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) { ?>
            <div class="col-md-6 d-flex align-items-stretch">
              <div class="card">
                <div class="card-img">
                  <img src="assets/img/events-1.jpg" alt="...">
                </div>
                <div class="card-body">
                  <h5 class="card-title text-danger"><?= $row['event_title'] ?></h5>
                  <p class="fst-italic text-center"><?= $row['date_and_time'] ?></p>
                  <p class="card-text"><?= $row['description'] ?></p>
                  <?php
                  if (!isset($_SESSION['is_login'])) { ?>
                    <a href="login.php">
                      <h4>View Details</h4>
                    </a>
                  <?php } else { ?>
                    <a href="events-details.php?id=<?= $row['event_id'] ?> ">
                      <h4>View Details</h4>
                    </a>
                  <?php } ?>
                </div>
              </div>
            </div>
        <?php }
        } else {
          echo "No records found.";
        }
        ?>


        <div class="col-md-6 d-flex align-items-stretch">
          <div class="card">
            <div class="card-img">
              <img src="assets/img/events-2.jpg" alt="...">
            </div>
            <div class="card-body">
              <h5 class="card-title"><a href="events-details.php">Marketing Strategies</a></h5>
              <p class="fst-italic text-center">Sunday, November 15th at 7:00 pm</p>
              <p class="card-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo</p>
              <?php
              if (!isset($_SESSION['is_login'])) { ?>
                <a href="login.php">
                  <h4>View Details</h4>
                </a>
              <?php } else { ?>
                <a href="events-details.php">
                  <h4>View Details</h4>
                </a>
              <?php } ?>
            </div>
          </div>
        </div>

        <?php
        if (isset($_SESSION['is_login'])) {

          $sql1 = "SELECT * FROM users where email='" . $_SESSION['email'] . " ' ";
          $result1 = $conn->query($sql1);
          $row1 = $result1->fetch_assoc();

        ?>
          <?php
          if ($row1["role"] === 'Alumni') {
          ?>
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch text-center">
              <div class="member">
                <span id="boot-icon" class="bi bi-calendar-event" style="font-size:5rem"></span>
                <div class="member-content">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Add New Event</button>
                </div>
              </div>
            </div>
        <?php }
        } ?>
      </div>

    </div>
  </section><!-- End Events Section -->

  <div class="modal fade-out" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Event</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="events.php" method="post" enctype="multipart/form-data" class="row g-3">
            <div class="col-md-6">
              <label for="inputEmail4" class="form-label">Title</label>
              <input type="text" class="form-control" id="inputEmail4" name="event_title" placeholder="Title of Event" required>
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Organizer</label>
              <input type="text" class="form-control" id="inputPassword4" name="organizer" placeholder="Organizer" required>
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Email of Organizer</label>
              <input type="email" class="form-control" id="inputPassword4" name="organizer_email" placeholder="Alumni Email" required>
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Type</label>
              <input type="text" class="form-control" id="inputPassword4" name="type" placeholder="Eg: Cultural Event" required>
            </div>
            <div class="col-md-6">
              <label for="inputEmail4" class="form-label">Venue</label>
              <input type="text" class="form-control" id="inputEmail4" name="venue" placeholder="Venue" required>
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Date</label>
              <input type="date" class="form-control" id="inputPassword4" name="date_and_time" required>
            </div>
            <div class="col-12">
              <label for="inputAddress" class="form-label">Description</label>
              <textarea class="form-control" rows="4" cols="50" name="description" name="description" placeholder="Description of Event" required></textarea>
            </div>
            <div class="col-12">
              <label for="inputAddress" class="form-label">How to join Event?</label>
              <textarea class="form-control" rows="4" cols="50" name="join_event" placeholder="How to join Event?" required></textarea>
            </div>
            <div class="col-12">
              <label for="inputAddress2" class="form-label">Banner of Event(Image Only)</label>
              <input class="form-control" type="file" id="formFile" name="banner_image" accept="image/png, image/jpeg">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">ADD</button>
        </div>
        </form>
      </div>
    </div>
  </div>

</main><!-- End #main -->

<?php include('head/footer.php') ?>