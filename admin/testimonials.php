<?php

include 'head/header.php';
$flag = 0;
if (isset($_SESSION['testimonial_deleted'])) {
    if ($_SESSION['testimonial_deleted'] === true) {
        $flag = 1;
        $error_message1 = "Testimonial deleted successfully!";
    } else {
        $flag = 2;
        $error_message1 = "Testimonial deletion failed!";
    }
    unset($_SESSION['testimonial_deleted']);
}

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

                        <?php
                        if ($flag == 1) {
                        ?>
                            <div class="alert alert-success " role="alert">
                                <?php echo $error_message1; ?>
                            </div>
                        <?php
                        } else if ($flag == 2) {
                        ?>
                            <div class="alert alert-danger p-1 text-danger" role="alert">
                                <?php echo $error_message1; ?>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-bordered" width="100%" cellspacing="0">
                                <thead class="student-thread">
                                    <tr>
                                        <th>
                                            <div class="form-check check-tables">
                                                <input class="form-check-input" type="checkbox" value="something">
                                            </div>
                                        </th>
                                        <th>Testimonial ID</th>
                                        <th>Provider Name</th>
                                        <th>Post</th>
                                        <th>Description</th>
                                        <th>Actions</th>
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
                                                <td><textarea style="border: none; outline:none;" readonly rows="4" cols="50"> <?= $row["description"] ?></textarea> </td>
                                                <td class="text-center">

                                                    <a href="edit-testimonial.php?testimonials_id=<?= $row['testimonials_id'] ?>" class="btn btn-primary m-1" role="button"><i class="fa fa-eye"></i>View</a>
                                                    <a href="edit-testimonial.php?testimonials_id=<?= $row["testimonials_id"] ?>" role="button" class="btn btn-success m-1"><i class="fa fa-edit"></i> Edit </a>
                                                    <form action="delete.php" method="post">
                                                        <input type="hidden" name="testimonials_id" value="<?= $row["testimonials_id"] ?>">
                                                        <button type="button" name="delete_user" class="btn btn-danger m-1" data-bs-toggle="modal" data-bs-target="#exampleModal_<?= $row['testimonials_id'] ?>"><i class="bi bi-trash3"></i> Delete </button>
                                                        <div class="modal fade" id="exampleModal_<?= $row['testimonials_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog text-start">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Delete Testimonial</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Are you sure you want to delete?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit" name="delete_testimonials" class="btn btn-danger">Delete</button>
                                                    </form>
                        </div>
                    </div>
                </div>
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