<?php
include 'head/header.php';
$sql = "SELECT COUNT(*) As users FROM users";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$sql5 = "SELECT COUNT(*) As admins FROM admin";
$result5 = $conn->query($sql5);
$row5 = $result5->fetch_assoc();
$sql1 = "SELECT COUNT(*) As users FROM testimonials";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();
$sql2 = "SELECT COUNT(*) As students FROM users where role='Student' ";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();
$sql3 = "SELECT COUNT(*) As events FROM events ";
$result3 = $conn->query($sql3);
$row3 = $result3->fetch_assoc();
$sql4 = "SELECT COUNT(*) As jobs FROM jobs ";
$result4 = $conn->query($sql4);
$row4 = $result4->fetch_assoc();
$sql6 = "SELECT COUNT(*) As alumni FROM alumni ";
$result6 = $conn->query($sql6);
$row6 = $result6->fetch_assoc();
$sql7 = "SELECT * FROM admin where admin_email='" . $_SESSION['admin_email'] . " ' ";
$result7 = $conn->query($sql7);
$row7 = $result7->fetch_assoc();
?>

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Welcome <?= $row7['firstname'] ?>!</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Users</h6>
                                <h3><?= $row['users'] ?></h3>
                            </div>
                            <div class="db-icon">
                                <img src="assets/img/icons/dash-icon-01.svg" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Adminstrator</h6>
                                <h3><?= $row5['admins'] ?></h3>
                            </div>
                            <div class="db-icon">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Students</h6>
                                <h3><?= $row2['students'] ?></h3>
                            </div>
                            <div class="db-icon">
                                <img src="assets/img/icons/dash-icon-01.svg" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Alumni</h6>
                                <h3><?= $row6['alumni'] ?></h3>
                            </div>
                            <div class="db-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Events</h6>
                                <h3><?= $row3['events'] ?></h3>
                            </div>
                            <div class="db-icon">
                                <i class="fas fa-calendar-day"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Jobs</h6>
                                <h3><?= $row4['jobs'] ?></h3>
                            </div>
                            <div class="db-icon">
                                <i class="fas fa-briefcase"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Testimonials</h6>
                                <h3><?= $row1['users'] ?></h3>
                            </div>
                            <div class="db-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'head/footer.php';

?>