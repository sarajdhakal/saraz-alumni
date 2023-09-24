<?php include('head/header.php'); 
$sql= "SELECT * FROM admin where admin_email='" . $_SESSION['admin_email'] . " ' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Profile</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="profile.php">Profile</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ul>
                </div>
            </div>
        </div>

       
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <img src="../upload_images/<?=$row['admin_image'] ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                <h5 class="my-3"><?=$row['firstname'] ?> <?=$row['lastname'] ?></h5>
                                <p class="text-muted mb-1 small"><?=$row['role'] ?></p>
                                <p class="text-muted mb-1"></p>
                                <p class="text-muted mb-4"></p>
                                <div class="d-flex justify-content-center mb-2">
                                    <a href="edit-admin-profile.php" style="color: white;"> <button type="button" class="btn btn-primary">Update Profile</button></a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-header" style="color: blue;">Profile Details</h5>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">First Name</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?=$row['firstname'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Last Name</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?=$row['lastname'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Gender</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?=$row['gender'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Email Address</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?=$row['admin_email'] ?> </p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Phone</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?=$row['phone_number'] ?> </p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Role</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?=$row['role'] ?> </p>
                                        </div>
                                    </div>
                                    <hr>

                                </div>
                            </div>
                        </div>


                    </div>
                </div>
           


       
    </div>
    <?php include('head/footer.php'); ?>