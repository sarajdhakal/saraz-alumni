<?php
session_start();
include 'head/header.php';
include 'config/db.php';
$sql = "SELECT * FROM events ";
$result = $conn->query($sql);
$sql1 = "SELECT * FROM users where email='" . $_SESSION['email'] . " ' ";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();
?>

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
        if (isset($_SESSION['is_login'])) { ?>
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
          <form action class="row g-3">
            <div class="col-md-6">
              <form action="events.php" method="post">
                <label for="inputEmail4" class="form-label">Title</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="Title of Event" required>
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Organizer</label>
              <input type="text" class="form-control" id="inputPassword4" placeholder="Organizer" required>
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Email of Organizer</label>
              <input type="email" class="form-control" id="inputPassword4" placeholder="Students or Alumni Email" required>
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Type</label>
              <input type="text" class="form-control" id="inputPassword4" placeholder="Eg: Cultural Event" required>
            </div>
            <div class="col-md-6">
              <label for="inputEmail4" class="form-label">Venue</label>
              <input type="text" class="form-control" id="inputEmail4" placeholder="Venue" required>
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Date and Time</label>
              <input type="datetime-local" class="form-control" id="inputPassword4" placeholder="Organizer?" required>
            </div>
            <div class="col-12">
              <label for="inputAddress" class="form-label">Description</label>
              <textarea class="form-control" rows="4" cols="50" placeholder="Description of Event" required></textarea>
            </div>
            <div class="col-12">
              <label for="inputAddress" class="form-label">How to join Event?</label>
              <textarea class="form-control" rows="4" cols="50" placeholder="How to join Event?" required></textarea>
            </div>
            <div class="col-12">
              <label for="inputAddress2" class="form-label">Banner of Event(Image Only)</label>
              <input type="file" class="form-control" id="inputimage" name="banner" accept="image/*">
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

<<<<<<< HEAD
<?php include('head/footer.php') ?>
=======
<?php include('head/footer.php') ?>
>>>>>>> 8004df7c459c85877af7ab62734407b76bd21ca9
