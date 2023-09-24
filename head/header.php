<?php
$curPageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> Alumni Management System</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/2.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.php" class="logo me-auto"><img src="assets/img/2.png" alt="" class="img-fluid"></a> -->
      <h1 class="logo me-auto"><a href="index.php" style="text-decoration: none;">Alumni Management System</a></h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a <?php if (strpos($_SERVER['PHP_SELF'], 'index.php')) echo 'class="active"'; ?> href="index.php">Home</a></li>
          <?php
          if (isset($_SESSION['is_login'])) { ?>
            <li><a <?php if (strpos($_SERVER['PHP_SELF'], 'profile.php')) echo 'class="active"'; ?> href="profile.php">Profile</a></li>
          <?php } ?>
          <li><a <?php if (strpos($_SERVER['PHP_SELF'], 'about.php')) echo 'class="active"'; ?> href="about.php">About</a></li>
          <li><a <?php if ((strpos($_SERVER['PHP_SELF'], 'jobs.php')) || (strpos($_SERVER['PHP_SELF'], 'jobs-details.php'))) echo 'class="active"'; ?> href="jobs.php">Jobs</a></li>
          <li><a <?php if ((strpos($_SERVER['PHP_SELF'], 'alumni.php')) || (strpos($_SERVER['PHP_SELF'], 'alumni-details.php'))) echo 'class="active"'; ?> href="alumni.php">Alumni</a></li>
          <li><a <?php if ((strpos($_SERVER['PHP_SELF'], 'events.php')) || (strpos($_SERVER['PHP_SELF'], 'events-details.php'))) echo 'class="active"'; ?> href="events.php">Events</a></li>
          <?php
          if (!isset($_SESSION['is_login'])) { ?>
            <li><a <?php if (strpos($_SERVER['PHP_SELF'], 'login.php')) echo 'class="active"'; ?>href="login.php">Sign In</a></li>
            <li><a <?php if (strpos($_SERVER['PHP_SELF'], 'register.php')) echo 'class="active"'; ?>href="register.php">Sign Up</a></li>
          <?php } else { ?>
            <li><a href="logout.php">Sign Out</a></li>
          <?php } ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->