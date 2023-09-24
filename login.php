<?php
session_start();
include ('head/header.php');
if(isset($_SESSION['is_login']) && $_SESSION == true){
    header('Location:index.php');
}
    $error_message='';
    $flag=0;
function validate_form($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  if ($_POST){
    $email = validate_form($_POST['email']);
     $pwd= validate_form($_POST['password']);
    $pass = password_hash($pwd,PASSWORD_DEFAULT);  
    include 'config/db.php'; 
    $sql = "SELECT * FROM users WHERE email='$email' ";
    $result = $conn->query($sql);
         if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
             // output data of each row

      if (password_verify($pwd, $row['password'])) {
        $_SESSION['email']= $email;
        $_SESSION['is_login'] = true;               
                header("Location:index.php");
                exit();
              
    } else {
        // Password is incorrect
        $flag=1;
        $error_message = "Incorrect password.";
    }
} else {
    $flag=1;
    // User not found
    $error_message = "User does not exist.";
}
}
?>



<head>
<link href="assets/css/loginpage.css" rel="stylesheet">
</head>

 <main >
<div class="wrapper">
<!----------------------------- Form box ----------------------------------->    
    <div class="form-box" >
        <!------------------- login form -------------------------->
       
      <!-- <img src="bg.png"> -->
        <div class="login-container" id="login" >
          <div class="welcome"> Welcome to Alumni Management System</div>
            <div class="top">
                <span>Don't have an account? <u><a href="register.php">Sign Up</a></u></span>
                <header>Sign In</header>                
            </div>
            <?php
        if ($flag==1) {
        ?>
          <div class="alert alert-danger p-1 text-danger" role="alert">
           <?php echo $error_message; ?> 
          </div>
        <?php
        }
        ?>
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
                    <span><a href="forgot.php">Forgot password?</a></span>
                </div>
            </div>
        </div>
    </div>
</div>     
 </main>
 <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/feather.min.js"></script>
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/plugins/apexchart/apexcharts.min.js"></script>
    <script src="assets/plugins/apexchart/chart-data.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>
