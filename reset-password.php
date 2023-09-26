<?php
$token = $_GET[ "token"];
$token__hash = hash ("sha256",$token);
$mysqli = require __DIR__ ."/config/database.php";

$sql = "SELECT * FROM users
WHERE reset_token_hash ='$token__hash'";
//$stmt = $mysqli->prepare($sql);
//$stmt->bind_param("s", $token_hash);
//$stmt->execute();
// $result = $stmt->get_result();
$result =$mysqli->query($sql);
$user = $result->fetch_assoc();

if ($user === null) {
    die("token not found");
}else{
}
if (strtotime($user["reset_token_expires_at"]) <= time()) {
    die("token has expired");
}

include ('head/header.php');
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
                    
         <!-- <span style="color: red;"><?php echo $error_message; ?></span> -->
            </div>
            <span style="color: white; margin-bottom:10px;">Enter your new password.</span>
            <form method="post" action="process-reset-password.php">
            <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

            <div class="input-box">
                <input type="password" class="input-field" name="password" id="password" placeholder="Enter your new password" required>
                <i class="bx bx-key"></i>
            </div>
            <div class="input-box">
                <input type="password" class="input-field" name="password_confirmation" id="password_confirmation" placeholder="Repeat your password" required>
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
<!-- <!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>

    <h1>Reset Password</h1>

    <form method="post" action="process-reset-password.php">

        <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

        <label for="password">New password</label>
        <input type="password" id="password" name="password">

        <label for="password_confirmation">Repeat password</label>
        <input type="password" id="password_confirmation"
               name="password_confirmation">

        <button>Send</button>
    </form>

</body>
</html> -->