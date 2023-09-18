<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Admin Dashboard</title>
    <link rel="shortcut icon" href="assets/img/2.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/feather/feather.css">
    <link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <div class="main-wrapper">

        <div class="header">

            <div class="header-left">
                <a href="index.php" class="logo">
                    <img src="assets/img/ams.png" alt="Logo">
                </a>
                <a href="index.php" class="logo logo-small">
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
                            <img class="rounded-circle" src="assets/img/profiles/avatar-01.jpg" width="31" alt="Soeng Souy">
                            <div class="user-text">
                                <h6>Saraj Dhakal</h6>
                                <p class="text-muted mb-0">Administrator</p>
                            </div>
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                                <img src="assets/img/profiles/avatar-01.jpg" alt="User Image" class="avatar-img rounded-circle">
                            </div>
                            <div class="user-text">
                                <h6>Saraj Dhakal</h6>
                                <p class="text-muted mb-0">Administrator</p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="profile.html">My Profile</a>
                        <a class="dropdown-item" href="../login.php">Logout</a>
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
                        <li class="active">
                            <a href="index.php"><i class="feather-grid"></i><span>Admin Dashboard</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fas fa-user"></i> <span> Students</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="students.php">Student List</a></li>
                                <li><a href="add-user.php">Student Add</a></li>
                                <!-- <li><a href="edit-student.html">Student Edit</a></li> -->
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fas fa-graduation-cap"></i> <span> Alumni</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="alumni.php">Alumni List</a></li>
                                <li><a href="add-alumni.php">Alumni Add</a></li>
                                <!-- <li><a href="edit-alumni.html">Alumni Edit</a></li> -->
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fas fa-user"></i> <span> Users</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="users.php">User List</a></li>
                                <li><a href="add-user.php">User Add</a></li>
                                <!-- <li><a href="edit-user.html">User Edit</a></li> -->
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fas fa-graduation-cap"></i> <span> Testimonials</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="testimonials.php">Testimonials List</a></li>
                                <li><a href="add-testimonial.php">Testimonials Add</a></li>
                                <!-- <li><a href="edit-testimonial.html">Testimonials Edit</a></li> -->
                            </ul>
                        </li>




                        <li>
                            <a href="events.php"><i class="fas fa-calendar-day"></i> <span>Events</span></a>
                        </li>
                        <li>
                            <a href="jobs.php"><i class="bi bi-briefcase-fill"></i></i> <span>Jobs</span></a>
                        </li>

                        <!-- <li class="submenu">
                            <a href="#"><i class="fa fa-home"></i> <span> Department</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a href="department.php">View Departments</a></li>
                                <li><a href="add-department.php">Add Department</a></li>
                                <!-- <li><a href="edit-department.html">Edit Department</a></li> -->
                            <!-- </ul>
                        </li> --> 
                        <li>
                            <a href="../login.php"><i class="bi bi-box-arrow-right"></i> <span>Logout</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>