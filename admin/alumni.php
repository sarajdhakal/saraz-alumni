<?php include ('head/header.php');
include ('../config/db.php');
$sql = "SELECT * FROM users where role='Alumni'";
$result = $conn->query($sql);

?>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Students</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="user.php">Students</a></li>
                            <li class="breadcrumb-item active">All Students</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="student-group-form">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search by ID ...">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search by Name ...">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search by Phone ...">
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="search-student-btn">
                        <button type="btn" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table comman-shadow">
                    <div class="card-body">

                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Students</h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    <!-- <a href="user.php" class="btn btn-outline-gray me-2 active"><i
                                                    class="feather-list"></i></a>
                                            <a href="#" class="btn btn-outline-primary me-2"><i
                                                    class="fas fa-download"></i> Download</a> -->
                                    <a href="add-user.php" class="btn btn-primary"><i class="fas fa-plus"></i> Add Student</a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                <thead class="student-thread">
                                    <tr>
                                        <th>
                                            <div class="form-check check-tables">
                                                <input class="form-check-input" type="checkbox" value="something">
                                            </div>
                                        </th>
                                        <th>User ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Gender</th>
                                        <th>Phone Number</th>
                                        <th>Address</th>
                                        <th>Enrollment Year</th>
                                        <th>Passout Year</th>
                                        <th>College</th>
                                        <th>University</th>
                                        <th>Faculty</th>
                                        <th>Work</th>
                                        <th>Social Media Contact1</th>
                                        <th>Social Media Contact2</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                      if ($result->num_rows > 0) {
                                         while ($row = $result->fetch_assoc()) { ?> 
                                    <tr>
                                        <td>
                                            <div class="form-check check-tables">
                                                <input class="form-check-input" type="checkbox" value="something">
                                            </div>
                                        </td>
                                        <td><?= $row["user_id"] ?></td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="../upload_images/<?= $row["user_image"] ?>" alt="User Image"></a>
                                                <a><?= $row["firstname"] ?> <?= $row["lastname"] ?></a>
                                            </h2>
                                        </td>
                                        <td><?= $row["email"] ?></td>
                                        <td><?= $row["role"] ?></td>
                                        <td><?= $row["gender"] ?></td>
                                        <td><?= $row["phone_number"] ?> </td>
                                        <td><?= $row["adddress"] ?></td>
                                        <td><?= $row["enrollment_year"] ?></td>
                                        <td><?= $row["passout_year"] ?></td>
                                        <td><?= $row["college"] ?></td>
                                        <td><?= $row["university"] ?></td>
                                        <td><?= $row["faculty"] ?></td>
                                        <td><?= $row["work"] ?></td>
                                        <td><?= $row["scmedia1"] ?></td>
                                        <td><?= $row["scmedia2"] ?></td>


                                        <td class="text-end">
                                        <div class="actions ">
                                                    <button type="button"  class="btn btn-primary m-1"><i class="bi bi-eye-fill"></i> View  </button>
                                                    <button type="button"  class="btn btn-success m-1"><i class="fa fa-edit"></i> Edit  </button>
                                                    <button type="button"  class="btn btn-danger m-1"><i class="bi bi-trash3"></i> Delete</button>
                                                    </div>
                                        </td>
                                    </tr>
                                    <?php }
                                      }
                                      ?>
                                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include 'head/footer.php'; ?>
