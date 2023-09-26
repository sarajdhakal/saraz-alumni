<?php
include('head/header.php');
if (isset($_SESSION['is_login']) && $_SESSION == true) {
  header('Location:index.php');
}
$error_fname = $error_lname = $error_email = $error_pass = $error_rpass = $error_eyear = $error_pyear = $error_message = $error_message1 = '';
$flag = 0;
function validate_form($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if ($_POST) {
  $fname = validate_form($_POST['firstname']);
  $lname = validate_form($_POST['lastname']);
  $email = validate_form($_POST['email']);
  $phone = validate_form($_POST['phone_number']);
  $pass = validate_form($_POST['password']);
  $rpass = validate_form($_POST['rpassword']);
  $role = validate_form($_POST['role']);
  $gender = validate_form($_POST['gender']);
  $eyear = validate_form($_POST['enrollment_year']);
  $pyear = validate_form($_POST['passout_year']);

  include 'config/db.php';
  $sql = "SELECT * FROM users WHERE email='$email' ";
  $result = $conn->query($sql);

  $sql2 = "SELECT student_email from student WHERE student_email='$email' ";
  $result2 = $conn->query($sql2);
  if ($result2->num_rows == 0) {
    $error_message1 = "Your email address is not registered to college.";
    $flag = 1;
  } else if ($result->num_rows > 0) {
    // output data of each row
    $error_message1  = "User already existed.";
    $flag = 1;
  } else {
    if (strlen($fname) < 3) {
      $error_message1  = "First name should have more than 2 letters.";
      $flag = 1;
    } else if (strlen($lname) < 3) {
      $error_message1  = "Last name  should have more than 2  letters.";
      $flag = 1;
    } else if ($pass != $rpass) {
      $error_message1 = "Password not matched";
      $flag = 1;
    } else if (strlen($pass) < 8) {
      $error_message1 = "Password must be at least 8 characters";
      $flag = 1;
    } else if (!preg_match("/[a-z]/i", $pass)) {
      $error_message1 = ' Password must contain at least one letter';
      $flag = 1;
    } else if (!preg_match("/[0-9]/", $pass)) {
      $error_message1 = 'Password must contain at least one number';
      $flag = 1;
    } else if ($role == 'Alumni' && $pyear == '') {
      $error_message1 = 'Alumni must enter passout year.';
      $flag = 1;
    } else if ($role == 'Alumni' && $pyear != '') {
      if (($pyear - $eyear) < 4) {
        $error_message1 = 'Invalid passout year.';
        $flag  = 1;
      }
    } else if ($role == 'Student' && $pyear > 0) {
      $error_message1 = 'Student cannot have passout year.';
      $flag =  1;
    }
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    if ($flag == 0) {
      $sql = "INSERT INTO users (firstname, lastname, email, phone_number,password,role,gender,enrollment_year,passout_year) 
                   VALUES ('$fname', '$lname', '$email', '$phone','$pass','$role','$gender','$eyear','$pyear')";
      if ($conn->query($sql) === true) {
        $flag = 2;
        $error_message1 = 'Successfully registered.';
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
  }
}
?>

<head>
  <link href="assets/css/loginpage.css" rel="stylesheet">
</head>
<main>
  <div class="wrapper">
    <!----------------------------- Form box ----------------------------------->
    <div class="form-box">
      <!------------------- registration form -------------------------->
      <div class="register-container" id="register">
        <div class="welcome"> Welcome to Alumni Management System</div>
        <div class="top">
          <span>Have an account? <a href="login.php"><u>Sign In</a></u></span>
          <header style="padding: 1px;">Sign Up</header>
        </div>
        <?php
        if ($flag == 2) {
        ?>
          <div class="alert alert-success p-1" role="alert">
            <?php echo $error_message1; ?> Proceed to <a href="login.php" class="alert-link">Sign In</a>
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
        <form action="register.php" method="post">
          <div class="two-forms">
            <div class="input-box">
              <input type="text" name="firstname" class="input-field" placeholder="Firstname" required>
              <i class="bx bx-user"></i>
            </div>
            <div class="input-box">
              <input type="text" name="lastname" class="input-field" placeholder="Lastname" required>
              <i class="bx bx-user"></i>
            </div>
          </div>
          <div class="two-forms">
            <div class="input-box info-tooltip">
              <input type="email" name="email" class="input-field" placeholder="Email" required>
              <i class="bx bx-envelope"></i>
              <span class="tooltip-text">Please make sure to enter a valid email address that is registered in college.</span>
            </div>
            <div class="input-box">
              <input type="text" name="phone_number" class="input-field" placeholder="Phone Number" required>
              <i class="bx bx-phone"></i>
            </div>
          </div>
          <div class="two-forms">
            <div class="input-box info-tooltip">
              <input type="password" name="password" class="input-field" placeholder="Password" required>
              <i class="bx bx-lock-alt"></i>
              <span class="tooltip-text">Password must be at least 8 characters with at least one letter and at least  one number</span>
            </div>
            <div class="input-box">
              <input type="password" name="rpassword" class="input-field" placeholder="Confirm Password" required>
              <i class="bx bx-lock-alt"></i>

            </div>
          </div>
          <div class="two-forms">
            <div class="input-box">
              <label style="color:white;">Choose Role :</label>
              <select name="role" id="role" class="input-field">
                <option value="Student" class="input-fields">Student</option>
                <option value="Alumni" class="input-fields">Alumni</option>
              </select>
              <i class="bx bx-group"></i>
            </div>
            <div class="input-box">
              <label style="color:white;">Gender :</label>
              <select name="gender" id="role" class="input-field">
                <option value="Male" class="input-fields">Male</option>
                <option value="Female" class="input-fields">Female</option>
                <option value="Others" class="input-fields">Others</option>
              </select>
              <i class="bi bi-gender-ambiguous"></i>
            </div>
          </div>
          <div class="two-forms">
            <div class="input-box info-tooltip">
              <label style="color:white;">Enrollment Year</label><input type="number" name="enrollment_year" class="input-field" placeholder="YYYY" min="1999" max="2023" required>
              <span class="tooltip-text">Enter your enrollment year in AD.</span>

             <script>
                document.querySelector("input[type=number]")
                  .oninput = e => console.log(new Date(e.target.valueAsNumber, 0, 1))
              </script>
              <i class="bx bx-calendar"></i>
            </div>
            <div class="input-box info-tooltip">
              <label style="color:white;">Passout Year</label><input type="number" name="passout_year" class="input-field" placeholder="YYYY" min="1999" max="2023">
              <span class="tooltip-text">Enter your passout year in AD.</span>
             <script>
                document.querySelector("input[type=number]")
                  .oninput = e => console.log(new Date(e.target.valueAsNumber, 0, 1))
              </script>
              <i class="bx bx-calendar"></i>
            </div>
          </div>
          <small class="text-white">
          Be sure to check your <a href="privacy.php"> Eligibility Criteria </a></small>
          <div class="input-box">
            <button type="Submit" class="submit">Sign Up</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</main>