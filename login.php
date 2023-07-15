<?php
session_start();
include ('head/header.php');

if(isset($_SESSION['is_login']) && $_SESSION == true){
    header('Location:index.php');
}
    $error_message='';
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
 </main>

