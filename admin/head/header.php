<?php
ob_start();
include('../config/cookie.php');
if (!isset($_SESSION['admin_login']) || $_SESSION == false) {
    header('Location:login.php');
}
include('../config/db.php');
$sql = "SELECT * FROM admin where admin_email='" . $_SESSION['admin_email'] . " ' ";
$admin_email = $_SESSION['admin_email'];
$result = $conn->query($sql);
$row1 = $result->fetch_assoc();
error_reporting(E_ALL);
ini_set('display_errors', 1);
// var_dump($_SESSION);
// die();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Admin Panel | AMS </title>
    <link rel="shortcut icon" href="assets/img/2.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/plugins/feather/feather.css">
    <link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css" />
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <div class="main-wrapper">

        <div class="header">

            <div class="header-left">
                <a href="admin-index.php" class="logo">
                    <img src="assets/img/ams.png" alt="Logo">
                </a>
                <a href="admin-index.php" class="logo logo-small">
                    <img src="assets/img/2.png" alt="Logo" width="30" height="30">
                </a>
            </div>
            <div class="menu-toggle">
                <a href="javascript:void(0);" id="toggle_btn">
                    <i class="fas fa-bars"></i>
                </a>
            </div>
            <a class="mobile_btn" id="mobile_btn">
                <i class="fas fa-bars"></i>
            </a>

            <ul class="nav user-menu">


                <li class="nav-item dropdown has-arrow new-user-menus">
                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <span class="user-img">
                            <img class="rounded-circle" src="../upload_images/<?= $row1['admin_image'] ?>" width="31" alt="Soeng Souy">
                            <div class="user-text">
                                <h6> <?= $row1['firstname'] ?> <?= $row1['lastname'] ?> </h6>
                                <p class="text-muted mb-0"><?= $row1['role'] ?></p>
                            </div>
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                                <img src="../upload_images/<?= $row1['admin_image'] ?>" alt="User Image" class="avatar-img rounded-circle">
                            </div>
                            <div class="user-text">
                                <h6><?= $row1['firstname'] ?> <?= $row1['lastname'] ?></h6>
                                <p class="text-muted mb-0"><?= $row1['role'] ?></p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="admin-profile.php">My Profile</a>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>

            </ul>

        </div>


        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <!-- <li class="menu-title">
                            <span>Main Menu</span>
                        </li> -->
                        <li <?php if (strpos($_SERVER['PHP_SELF'], 'admin-index.php')) echo 'class="active"'; ?>>
                            <a href="admin-index.php"><i class="feather-grid"></i><span>Admin Dashboard </span></a>
                        </li>
                        <li class="submenu  <?php if ((strpos($_SERVER['PHP_SELF'], 'users.php')) || (strpos($_SERVER['PHP_SELF'], 'add-user.php')) || (strpos($_SERVER['PHP_SELF'], 'edit-user.php'))) echo 'active'; ?>">
                            <a href="#"><i><img class="img-fluid" src="assets/img/icons/user.svg" alt="Icon"></i> </i><span> Users</span> <span class="menu-arrow "></span></a>
                            <ul>
                                <li><a <?php if (strpos($_SERVER['PHP_SELF'], 'users.php')) echo 'class="active"'; ?> href="users.php">User List</a></li>
                                <li><a <?php if (strpos($_SERVER['PHP_SELF'], 'add-user.php')) echo 'class="active"'; ?> href="add-user.php">Add User</a></li>
                                <?php  if (strpos($_SERVER['PHP_SELF'], 'edit-user.php')){ ?>
                                <li><a href="edit-user.php" class="active">Edit User</a></li>
                            <?php  }?>
                            </ul>
                        </li>
                        <li class="submenu <?php if ((strpos($_SERVER['PHP_SELF'], 'students.php')) || (strpos($_SERVER['PHP_SELF'], 'edit-student.php'))) echo 'active'; ?>"> 
                            <a href="#"><i><img class="img-fluid" src="assets/img/icons/student.svg" alt="Icon"></i> <span> Students</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a <?php if (strpos($_SERVER['PHP_SELF'], 'students.php')) echo 'class="active"'; ?> href="students.php">Student List</a></li>
                                <li><a <?php if (strpos($_SERVER['PHP_SELF'], 'add-student.php')) echo 'class="active"'; ?> href="add-student.php">Add Student </a></li>
                              <?php  if (strpos($_SERVER['PHP_SELF'], 'edit-student.php')){ ?>
                                <li><a href="edit-student.php" class="active">Edit Student</a></li>
                            <?php  }?>

                            </ul>
                        </li> 
                        <li class="submenu  <?php if ((strpos($_SERVER['PHP_SELF'], 'alumni.php')) || (strpos($_SERVER['PHP_SELF'], 'add-alumnis.php')) || (strpos($_SERVER['PHP_SELF'], 'edit-alumnis.php'))) echo 'active'; ?>">
                            <a href="#"><i><img class="img-fluid" src="assets/img/icons/alumni.svg" alt="Icon"></i></i> <span> Alumni</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a <?php if (strpos($_SERVER['PHP_SELF'], 'alumni.php')) echo 'class="active"'; ?> href="alumni.php">Alumni List</a></li>
                                <li><a <?php if (strpos($_SERVER['PHP_SELF'], 'add-alumnis.php')) echo 'class="active"'; ?> href="add-alumnis.php">Add Alumni</a></li>
                                <?php  if (strpos($_SERVER['PHP_SELF'], 'edit-alumnis.php')){ ?>
                                <li><a href="edit-alumnis.php" class="active">Edit Alumni</a></li>
                            <?php  }?>
                            </ul>
                        </li>
                      
                        <li class="submenu  <?php if ((strpos($_SERVER['PHP_SELF'], 'admin.php')) || (strpos($_SERVER['PHP_SELF'], 'add-admins.php')) || (strpos($_SERVER['PHP_SELF'], 'edit-admins.php'))) echo 'active'; ?>">
                            <a href="#"><i><img class="img-fluid" src="assets/img/icons/admin.png" alt="Icon"></i> <span> Admin</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a <?php if (strpos($_SERVER['PHP_SELF'], 'admin.php')) echo 'class="active"'; ?> href="admin.php">Admin List</a></li>
                                <li><a <?php if (strpos($_SERVER['PHP_SELF'], 'add-admins.php')) echo 'class="active"'; ?> href="add-admins.php">Add Admin </a></li>
                                <?php  if (strpos($_SERVER['PHP_SELF'], 'edit-admins.php')){ ?>
                                <li><a href="edit-admins.php" class="active">Edit Admin</a></li>
                            <?php  }?>
                            </ul>
                        </li>

                        <li class="submenu  <?php if ((strpos($_SERVER['PHP_SELF'], 'testimonials.php')) || (strpos($_SERVER['PHP_SELF'], 'add-testimonial.php')) || (strpos($_SERVER['PHP_SELF'], 'edit-testimonial.php'))) echo 'active'; ?>">
                            <a href="#"><i><img class="img-fluid" src="assets/img/icons/testimonial.svg" alt="Icon"></i> <span> Testimonials</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a <?php if (strpos($_SERVER['PHP_SELF'], 'testimonials.php')) echo 'class="active"'; ?> href="testimonials.php">Testimonials List</a></li>
                                <li><a <?php if (strpos($_SERVER['PHP_SELF'], 'add-testimonial.php')) echo 'class="active"'; ?> href="add-testimonial.php">Add Testimonials </a></li>
                                <?php  if (strpos($_SERVER['PHP_SELF'], 'edit-testimonial.php')){ ?>
                                <li><a href="edit-testimonial.php" class="active">Edit testimonial</a></li>
                            <?php  }?>
                            </ul>
                        </li>
                        <li class="submenu  <?php if ((strpos($_SERVER['PHP_SELF'], 'events.php')) || (strpos($_SERVER['PHP_SELF'], 'add-event.php')) || (strpos($_SERVER['PHP_SELF'], 'edit-event.php'))) echo 'active'; ?>">
                            <a href="#"><i><img class="img-fluid" src="assets/img/icons/calendar.svg" alt="Icon"></i> <span> Events</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a <?php if (strpos($_SERVER['PHP_SELF'], 'events.php')) echo 'class="active"'; ?> href="events.php">Events List</a></li>
                                <li><a <?php if (strpos($_SERVER['PHP_SELF'], 'add-event.php')) echo 'class="active"'; ?> href="add-event.php"> Add Events</a></li>
                                <?php  if (strpos($_SERVER['PHP_SELF'], 'edit-event.php')){ ?>
                                <li><a href="edit-event.php" class="active">Edit Events</a></li>
                            <?php  }?>
                            </ul>
                        </li>
                        <li class="submenu  <?php if ((strpos($_SERVER['PHP_SELF'], 'jobs.php')) || (strpos($_SERVER['PHP_SELF'], 'add-jobs.php')) || (strpos($_SERVER['PHP_SELF'], 'edit-job.php'))) echo 'active'; ?>">
                            <a href="#"><i><img class="img-fluid" src="assets/img/icons/briefcase.svg" alt="Icon"></i> <span> Jobs</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a <?php if (strpos($_SERVER['PHP_SELF'], 'jobs.php')) echo 'class="active"'; ?> href="jobs.php">Jobs List</a></li>
                                <li><a <?php if (strpos($_SERVER['PHP_SELF'], 'add-job.php')) echo 'class="active"'; ?> href="add-job.php">Add Jobs</a></li>
                                <?php  if (strpos($_SERVER['PHP_SELF'], 'edit-job.php')){ ?>
                                <li><a href="edit-job.php" class="active">Edit Jobs</a></li>
                            <?php  }?>
                            </ul>
                        </li>
                        <li <?php if ((strpos($_SERVER['PHP_SELF'], 'admin-profile.php'))  || (strpos($_SERVER['PHP_SELF'], 'edit-admin-profile.php'))) echo 'class="active"'; ?>>
                            <a href="admin-profile.php"><i><img class="img-fluid" src="assets/img/icons/profile.svg" alt="Icon"></i></i><span>My Profile </span></a>
                        </li>
                        <li>
                            <a href="logout.php"><i><img class="img-fluid" src="assets/img/icons/logout.svg" alt="Icon"></i> <span>Logout</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>