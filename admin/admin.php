<?php

include 'head/header.php';

$sql = "SELECT * FROM admin";
$result = $conn->query($sql);

?>
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Admin</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="user.php">Admin</a></li>
                            <li class="breadcrumb-item active">All Admin</li>
                        </ul>
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
                                    <h3 class="page-title">Admin</h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    <!-- <a href="user.php" class="btn btn-outline-gray me-2 active"><i
                                                    class="feather-list"></i></a>
                                            <a href="#" class="btn btn-outline-primary me-2"><i
                                                    class="fas fa-download"></i> Download</a> -->
                                    <a href="add-admins.php" class="btn btn-primary"><i class="fas fa-plus"></i> Add Admin</a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="dataTable" class="table table-bordered" width="100%" cellspacing="0">
                                <thead class="student-thread">
                                <tr>
                                        <th>
                                            <div class="form-check check-tables">
                                                <input class="form-check-input" type="checkbox" value="something">
                                            </div>
                                        </th>
                                        <th>Admin ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>

                                        <th>Phone Number</th>

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
                                                <td><?= $row["admin_id"] ?></td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="../upload_images/<?= $row["admin_image"] ?>" alt="User Image"></a>
                                                        <a><?= $row["firstname"] ?> <?= $row["lastname"] ?></a>
                                                    </h2>
                                                </td>
                                                <td><?= $row["admin_email"] ?></td>
                                                <td><?= $row["role"] ?></td>

                                                <td><?= $row["phone_number"] ?> </td>



                                                <td>
                                                  
                                                <a href="edit-admins.php?admin_id=<?= $row['admin_id'] ?>" class="btn btn-primary m-1" role="button"><i class="fa fa-eye"></i>View</a>
                                                    <a href="edit-admins.php?admin_id=<?= $row['admin_id'] ?>" role="button" class="btn btn-success m-1"><i class="fa fa-edit"></i> Edit </a>
                                                        <?php if (($row["role"]) != "Super Admin") { ?>
                                                            <form action="delete.php" method="post">
                                                        <input type="hidden" name="admin_id" value="<?= $row["admin_id"] ?>">
                                                        <button type="button" name="delete_user" class="btn btn-danger m-1" data-bs-toggle="modal" data-bs-target="#exampleModal_<?= $row['admin_id'] ?>"><i class="bi bi-trash3"></i> Delete </button>
                                                            <div class="modal fade" id="exampleModal_<?= $row['admin_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Are you sure you want to delete?                                                                           
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit" name="delete_admin" class="btn btn-danger">Delete</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <?php } ?>
                                                    
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