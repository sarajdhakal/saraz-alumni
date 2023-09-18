<?php include 'head/header.php';
include '../config/db.php';
$sql = "SELECT * FROM testimonials";
$result = $conn->query($sql);
?>
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Testimonials</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="testimonials.php">Testimonial</a></li>
                            <li class="breadcrumb-item active">All Testimonials</li>
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
                                    <h3 class="page-title">Testimonials</h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    <!-- <a href="testimonials.html" class="btn btn-outline-gray me-2 active"><i class="feather-list"></i></a> -->
                                    <!-- <a href="#" class="btn btn-outline-primary me-2"><i class="fas fa-download"></i> Download</a> -->
                                    <a href="add-testimonial.php" class="btn btn-primary"><i class="fas fa-plus"></i>Add Testimonial</a>
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
                                        <th>Testimonial ID</th>
                                        <th>Name</th>
                                        <th>Post</th>
                                        <th>Description</th>
                                        <th class="text-end">Action</th>
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
                                                <td><?= $row["testimonials_id"] ?></td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="../upload_images/<?= $row["testimonials_image"] ?>" alt="User Image"></a>
                                                        <a><?= $row["testimonials_name"] ?></a>
                                                    </h2>
                                                </td>
                                                <td><?= $row["post"] ?></td>
                                                <td><?= $row["description"] ?></td>
                                                <td class="text-end">
                                                    <div class="actions ">
                                                        <form action="edit-testimonials.php" method="post">
                                                            <input type="hidden" name="testimonials_id" value="<?= $row["testimonials_id"] ?>">
                                                            <button type="submit" name="edit" class="btn btn-primary m-1"><i class="fa fa-eye"></i> View </button>
                                                            <button type="submit" name="edit" class="btn btn-success m-1"><i class="fa fa-edit"></i> Edit </button>
                                                        </form>
                                                        <form action="delete.php" method="post">
                                                            <input type="hidden" name="testimonials_id" value="<?= $row["testimonials_id"] ?>">
                                                            <button type="submit" name="delete" class="btn btn-primary m-1"><i class="bi bi-trash3"></i> Delete </button>
                                                        </form>
                                                    </div>
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

<?php
include 'head/footer.php';
?>