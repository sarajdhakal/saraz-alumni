<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
session_start();
// var_dump($_SESSION);
// die();
if (isset($_SESSION["admin_login"]) && $_SESSION == true) {
    header('Location:admin-index.php');
}

$error_message = '';
function validate_form($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_POST) {
    $admin_email = validate_form($_POST['admin_email']);
    $pwd = validate_form($_POST['password']);
    $pass = password_hash($pwd, PASSWORD_DEFAULT);
    include '../config/db.php';
    $sql = "SELECT * FROM admin WHERE admin_email='$admin_email' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // output data of each row

        if (password_verify($pwd, $row['password'])) {
            $_SESSION['admin_email'] = $admin_email;
            $_SESSION["admin_login"] = true;
            header("Location:admin-index.php");
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

    <title> Alumni Management System</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/2.png" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Template Main CSS File -->
    <link href="../assets/css/loginpage.css" rel="stylesheet">
</head>

<body>
    <!-- ======= Header ======= -->

    <main>
        <div class="wrapper">
            <!----------------------------- Form box ----------------------------------->
            <div class="form-box vh-80">
                <!------------------- login form -------------------------->
                <div class="login-container" id="login">
                    <div class="welcome"> Welcome to Alumni Management System</div>
                    <div class="top">
                        <span> <u></u></span>
                        <header>Admin Sign In</header>
                       
                        <span style="color: red;"><?php echo $error_message; ?></span>
                    </div>
                    <form action="login.php" method="post">
                        <div class="input-box">
                            <input type="email" class="input-field" name="admin_email" placeholder="Email" required>
                            <i class="bx bx-envelope"></i>
                        </div>
                        <div class="input-box">
                            <input type="password" class="input-field" name="password" placeholder="Password" required>
                            <i class="bx bx-lock-alt"></i>
                        </div>
                        <div class="input-box">
                            <button type="submit" class="submit">Sign In</button>
                        </div>
                    </form>
                    <div class="one-col align-items-center">
                        <div class="top two">
                            <span><a href="forgot.php">Forgot password?</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>