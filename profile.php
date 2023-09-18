<?php
session_start();
$error_pyear = $error_message = $error_message1 = '';

if (!isset($_SESSION['is_login']) && $_SESSION == false) {
  header('Location:login.php');
}

?>
<?php
include 'head/header.php';
include 'config/db.php';

$sql = "SELECT * FROM users where email='" . $_SESSION['email'] . " ' ";
$email = $_SESSION['email'];
$result = $conn->query($sql);
$row = $result->fetch_assoc();


<<<<<<< HEAD
?>
<main id="main">
  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
      <h2>Profile</h2>
      <p>Edit and Update your Profile </p>
      
      <p style="color: red;"><?php echo $error_message1; ?></p>
    </div>
  </div><!-- End Breadcrumbs -->

=======


?>
<main id="main">
  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
      <h2>Profile</h2>
      <p>Edit and Update your Profile </p>
      
      <p style="color: red;"><?php echo $error_message1; ?></p>
    </div>
  </div><!-- End Breadcrumbs -->

>>>>>>> 8004df7c459c85877af7ab62734407b76bd21ca9
  <!-- ======= Profile Section ======= -->
  <section style="background-color: #eee;">
    <div class="container py-5" data-aos="fade-up">
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
<<<<<<< HEAD
              <img src="upload_images/<?= $row["user_image"] ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
=======
              <img src="assets/img/2.png" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
>>>>>>> 8004df7c459c85877af7ab62734407b76bd21ca9
              <h5 class="my-3"><?= $row["firstname"] ?> <?= $row["lastname"] ?></h5>
              <p class="text-muted mb-1 small"><?= $row["role"] ?></p>
              <p class="text-muted mb-1"><?= $row["work"] ?></p>
              <p class="text-muted mb-4"><?= $row["adddress"] ?></p>
              <div class="d-flex justify-content-center mb-2">
<<<<<<< HEAD
              <a href="edit-profile.php" style="color: white;"> <button type="button" class="btn btn-primary" >Update Profile</button></a>
              </div>
            </div>
          </div>
          <div class="card mb-4">
            <div class="card-body">
              
            <h5 class="card-title">Pending Requests</h5>
               <p class="card-text">Hosting  Events</p> </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
            <h5 class="card-header">Profile Details</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Full Name</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?= $row["firstname"] ?> <?= $row["lastname"] ?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email Address</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?= $row["email"] ?> </p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Phone</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?= $row["phone_number"] ?> </p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Batch</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?= $row["enrollment_year"] ?> </p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Address</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?= $row["adddress"] ?> </p>
                </div>
              </div>
             </div>
          </div>
          </div>

          <div class="card-body">
          <div class="list-group-item d-flex justify-content-between align-items-center p-3">
            <h5>Contact Details</h5>
          </div>
          <div class="card mb-4 mb-lg-0">
            <div class="card-body p-0">
              <ul class="list-group list-group-flush rounded-3">
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <p class="mb-0"><?= $row["scmedia1"] ?> </p>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <p class="mb-0"><?= $row["scmedia2"] ?></p>
                </li>
              </ul>
            </div>
          </div>
          </div>
              </div>
      </div>
    </div>
     
=======
                <button type="button" class="btn btn-primary" ><a href="edit-profile.php" style="color: white;">Update Profile</button></a>
              </div>
            </div>
          </div>
          <div class="card mb-4">
            <div class="card-body">
              
            <h5 class="card-title">Pending Requests</h5>
               <p class="card-text">Hosting  Events</p> </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
            <h5 class="card-header">Profile Details</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Full Name</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?= $row["firstname"] ?> <?= $row["lastname"] ?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email Address</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?= $row["email"] ?> </p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Phone</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?= $row["phone_number"] ?> </p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Batch</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?= $row["enrollment_year"] ?> </p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Address</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?= $row["adddress"] ?> </p>
                </div>
              </div>
            </div>
          </div>
          <div class="list-group-item d-flex justify-content-between align-items-center p-3">
            <h5>Contact Details</h5>
          </div>
          <div class="card mb-4 mb-lg-0">
            <div class="card-body p-0">
              <ul class="list-group list-group-flush rounded-3">
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <p class="mb-0"><?= $row["scmedia1"] ?> </p>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <p class="mb-0"><?= $row["scmedia2"] ?></p>
                </li>

              </ul>
            </div>
          </div>
          </div>
              </div>
      </div>
    </div>
>>>>>>> 8004df7c459c85877af7ab62734407b76bd21ca9
  </section>
  <!-- End of profile section -->

</main><!-- End #main -->

<?php include('head/footer.php') ?>

