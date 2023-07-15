<?php
session_start();

if(!isset($_SESSION['is_login']) && $_SESSION == false){
     header('Location:login.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title> AMS -INDEX</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/alumni.css" rel="stylesheet">
  
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
          <li><a  <?php if (strpos($_SERVER['PHP_SELF'], 'index.php')) echo 'class="active"';?> href="index.php"  >Home</a></li>
          <li><a  <?php if (strpos($_SERVER['PHP_SELF'], 'profile.php')) echo 'class="active"';?> href="profile.php"   >Profile</a></li>
          <li><a  <?php if (strpos($_SERVER['PHP_SELF'], 'about.php')) echo 'class="active"';?> href="about.php"  >About</a></li>
          <li><a <?php if (strpos($_SERVER['PHP_SELF'], 'jobs.php')) echo 'class="active"';?> href="jobs.php" >Jobs</a></li>
          <li><a <?php if (strpos($_SERVER['PHP_SELF'], 'alumni.php')) echo 'class="active"';?> href="alumni.php"  >Alumni</a></li>
          <li><a <?php if (strpos($_SERVER['PHP_SELF'], 'events.php')) echo 'class="active"';?>  href="events.php">Events</a></li>
                 
          
          <?php 
if(!isset($_SESSION['is_login'])){?>
   <li><a  <?php if (strpos($_SERVER['PHP_SELF'], 'login.php')) echo 'class="active"';?>href="login.php">Sign In</a></li> 
   <li><a  <?php if (strpos($_SERVER['PHP_SELF'], 'register.php')) echo 'class="active"';?>href="register.php">Sign Up</a></li> 
 <?php }
else
{?>   
 <li><a href="logout.php">Sign Out</a></li> 
<?php } ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->


  <main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <h2>Alumni</h2>
        <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <div id="filter-options">
      <label for="university-select">University:</label>
      <select id="university-select" class="input-field">
        <option value="all" selected class="input-fields">All</option>
        <option value="pokhara" class="input-fields"> Pokhara University</option>
        <option value="tu" class="input-fields">University</option>
      </select>
      
      <label for="school-select">College:</label>
      <select id="school-select" class="input-field">
        <option value="all" selected class="input-fields">All</option>
        <option value="utc" class="input-fields">Utc </option>
        <option value="tuc" class="input-fields">TUC</option>
      </select>
      
      <label for="faculty-select">Faculty:</label>
      <select id="faculty-select" class="input-fields">
        <option value="all" selected class="input-fields">All</option>
        <option value="computer" class="input-fields">Computer </option>
        <option value="civil" class="input-fields">civil</option>
        <option value="elec" class="input-fields">electrical</option>
      </select>
    </div>

    <!-- ======= Alumni Section ======= -->
    <section id="trainers" class="trainers">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <!-- <div id="filterable-div"> -->
          <!-- <div class="col-lg-4 col-md-6 d-flex align-items-stretch"> -->
          <div class="item pokhara utc computer col-lg-4 col-md-6">
                    <div class="member">
                      <img src="assets/img/2.png" class="img-fluid" alt="">
                      <div class="member-content">
                        <h4>Alumni Name</h4>
                        <span>Batch : Year</span>
                        <p>
                          Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis quaerat qui aut aut aut
                        </p>
                        <a href="alumni-details.php" ><h4> View Details</h4></a>
                      </div>
                    </div>
                  </div>
            <!-- </div> -->

        <!-- <div class="col-lg-4 col-md-6 d-flex align-items-stretch"> -->
        <div class="item pokhara utc computer col-lg-4 col-md-6">
                    <div class="member">
                      <img src="assets/img/2.png" class="img-fluid" alt="">
                      <div class="member-content">
                        <h4>Alumni Name</h4>
                        <span>Batch : 2020</span>
                        <p>
                          Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis quaerat qui aut aut aut
                        </p>
                        <a href="alumni-details.php" ><h4> View Details</h4></a>
                      </div>
                    </div>
                  </div>
            <!-- </div> -->

           <!-- <div class="col-lg-4 col-md-6 d-flex align-items-stretch"> -->
           <div class="item pokhara utc civil col-lg-4 col-md-6">
                    <div class="member">
                      <img src="assets/img/2.png" class="img-fluid" alt="">
                      <div class="member-content">
                        <h4>Alumni Name</h4>
                        <span>Batch :   Year</span>
                        <p>
                          Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis quaerat qui aut aut aut
                        </p>
                       <a href="alumni-details.php" ><h4> View Details</h4></a>
                      </div>
                    </div>
                  </div>

                  <div class="item tu tuc elec col-lg-4 col-md-6">
                    <div class="member">
                      <img src="assets/img/2.png" class="img-fluid" alt="">
                      <div class="member-content">
                        <h4>Alumni Name</h4>
                        <span>Batch : 2020</span>
                        <p>
                          Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis quaerat qui aut aut aut
                        </p>
                        <a href="alumni-details.php" ><h4> View Details</h4></a>
                      </div>
                    </div>
                  </div>

                  
            <!-- </div> -->
            <!-- </div> -->
            <!-- <div class="item tu tuc computer">tuc 1</div>
            <div class="item tu tuc civil">tuc2 </div>
            <div class="item pokhara utc elec">utc 3</div>
            <div class="item tu tuc elec">tuc3</div> -->
            
            <!-- Add more faculties under each school as needed -->
          
          <!-- </div>filterable-div -->

        </div>

      </div>
    </section><!-- End Trainers Section -->

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


  <script>
    // Get the necessary elements
    const universitySelect = document.getElementById('university-select');
    const schoolSelect = document.getElementById('school-select');
    const facultySelect = document.getElementById('faculty-select');
    const items = document.getElementsByClassName('item');
  
    // Attach event listener to university select
    universitySelect.addEventListener('change', filterItems);
    
    // Attach event listener to school select
    schoolSelect.addEventListener('change', filterItems);
  
    // Attach event listener to faculty select
    facultySelect.addEventListener('change', filterItems);
  
    // Function to filter items based on selected options
    function filterItems() {
      const selectedUniversity = universitySelect.value;
      const selectedSchool = schoolSelect.value;
      const selectedFaculty = facultySelect.value;
    
      // Loop through items and show/hide based on selected options
      for (let i = 0; i < items.length; i++) {
        const item = items[i];
        const university = item.classList.contains(selectedUniversity) || selectedUniversity === 'all';
        const school = item.classList.contains(selectedSchool) || selectedSchool === 'all';
        const faculty = item.classList.contains(selectedFaculty) || selectedFaculty === 'all';
    
        if (university && school && faculty) {
          item.classList.add('show');
        } else {
          item.classList.remove('show');
        }
      }
    }
  
    // Display all items initially
    for (let i = 0; i < items.length; i++) {
      const item = items[i];
      item.classList.add('show');
    }
  </script>
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
