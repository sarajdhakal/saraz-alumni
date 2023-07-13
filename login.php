
<?php
session_start();

    $error_message='';
function validate_form($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

if ($_POST){
    $email = validate_form($_POST['email']);
    $password= validate_form($_POST['password']);
    $pass = password_hash($password,PASSWORD_DEFAULT);  
    include 'config/db.php'; 
    $sql = "SELECT * FROM users WHERE email='$email' ";
    $result = $conn->query($sql);
         if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
             // output data of each row
      if (password_verify($pass, $row['password'])) {
                      header("Location: index.php");
        exit();
    } else {
        // Password is incorrect
        $error_message = "Incorrect password.";
    }
} else {
    // User not found
    $error_message = "User does not exist.";
}
}

?>






<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title> AMS-INDEX</title>
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
<link href="assets/css/loginpage.css" rel="stylesheet">
</head>
<body>
 
<div class="wrapper">
<!----------------------------- Form box ----------------------------------->    
    <div class="form-box">
        <!------------------- login form -------------------------->
       
      <!-- <img src="bg.png"> -->
        <div class="login-container" id="login">
          <div class="welcome"> Welcome to Alumni Management System</div>
            <div class="top">
                <span>Don't have an account? <a href="register.php">Sign Up</a></span>
                <header>Sign In</header>
                <span style="color: red;"><?php echo $error_message; ?></span>
            </div>
            <form action="login.php" method="post">
            <div class="input-box">
                <input type="email" class="input-field" name="email" placeholder="Email" required>
                <i class="bx bx-envelope"></i>
            </div>
            <div class="input-box">
                <input type="password" class="input-field" name="password" placeholder="Password" required>
                <i class="bx bx-lock-alt"></i>
            </div>
            <div class="input-box">
                <button type="submit" class="submit" >Sign In</button>
            </div>
            </form>
            <div class="one-col align-items-center">
                <div class="top two" >
                    <span><a href="#">Forgot password?</a></span>
                </div>
            </div>
        </div>
    </div>
</div>     
</body>
</html>