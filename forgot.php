<?php 
include('head/header.php');
$error_message='';
?>
<head>
<link href="assets/css/loginpage.css" rel="stylesheet">
</head>

 <main >
<div class="wrapper">
<!----------------------------- Form box ----------------------------------->    
    <div class="form-box" style="height:500px;">
        <!------------------- login form -------------------------->
       
      <!-- <img src="bg.png"> -->
        <div class="login-container" id="login" >
          <div class="welcome"> Alumni Management System</div>
            <div class="top">
                <span>Have an account? <u><a href="login.php">Sign In</a></u></span>
                              <header>Password Reset</header>
                <span style="color: red;"><?php echo $error_message; ?></span>
            </div>
            <span style="color: white; margin-bottom:10px;">Enter you email address and we'll send you an email with instructions to reset your password.</span>
            <form action="login.php" method="post">
            <div class="input-box">
                <input type="email" class="input-field" name="email" placeholder="Email" required>
                <i class="bx bx-envelope"></i>
            </div>
                     <div class="input-box">
                <button type="submit" class="submit" >Submit</button>
            </div>
            </form>
            
        </div>
    </div>
</div>     
 </main>
