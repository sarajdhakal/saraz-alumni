<?php 
include('head/header.php');
$error_message='';
$flag=0;
function validate_form($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if ($_POST){
    $pass = validate_form($_POST['password']);
    $rpass = validate_form($_POST['rpassword']);
    include 'config/db.php';

    if ($pass != $rpass) {
        $error_rpass = "Password not matched";
        $flag = 1;
      }
      $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

      $sql = "UPDATE users
      SET password = ?,
          reset_token_hash = NULL,
          reset_token_expires_at = NULL
      WHERE id = ?";

$stmt = $mysqli->prepare($sql);

if ($stmt) {
  $stmt->bind_param("ss", $password_hash, $user["id"]);

  if ($stmt->execute()) {
      $flag = 2; // Update was successful
  } else {
      $flag = 1; // Update failed
      $error_message = $stmt->error; // Store the error message
  }

  $stmt->close(); // Close the statement
} else {
  $flag = 1; // Statement preparation failed
  $error_message = $mysqli->error; // Store the error message
}
}
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
                <span style="color: red;"><?php echo $error_message; ?></span>
            </div>
            <form action="newpassword.php" method="post">
            <div class="input-box">
                <input type="password" class="input-field" name="password" placeholder="Enter your new password" required>
                <i class="bx bx-key"></i>
            </div>
            <div class="input-box">
                <input type="password" class="input-field" name="password" placeholder="Repeat your new password" required>
                <i class="bx bx-key"></i>
            </div>
                     <div class="input-box">
                <button type="submit" class="submit" >Submit</button>
            </div>
            </form>
            
        </div>
    </div>
</div>     
 </main>
