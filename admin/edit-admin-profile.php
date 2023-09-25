<?php include('head/header.php');
$sql = "SELECT * FROM admin where admin_email='" . $_SESSION['admin_email'] . " ' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$error_message1 = '';
$flag = 0;
function validate_form($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if (isset($_POST['update'])) {
    $firstname = validate_form($_POST['firstname']);
    $lastname = validate_form($_POST['lastname']);
    $email = validate_form($_POST['admin_email']);
    $phone = validate_form($_POST['phone_number']);
    $gender = validate_form($_POST['gender']);
    $admin_image = $_FILES['admin_image']['name'];
    if ($admin_image === '') {
        $admin_image = $row["admin_image"];
    }
    if (strlen($firstname) < 3) {
        $error_message1 = "Firstname name shoould be greater than 2 letters.";
        $flag = 1;
    } else if (strlen($lastname) < 3) {
        $error_message1 = "Lastname name shoould be greater than 2 letters.";
        $flag = 1;
    }
    if ($flag == 0) {
        move_uploaded_file($_FILES['admin_image']['tmp_name'], "../upload_images/$admin_image");
        $sql1 = "UPDATE  admin Set firstname='$firstname', lastname='$lastname', admin_email='$email', phone_number='$phone', gender='$gender', admin_image='$admin_image' 
        where admin_email='$email' ";

        if ($conn->query($sql1) === true) {
            $error_message1 = 'Successfully Updated.';
            $flag = 2;
        } else {
            echo "Error: " . $sql1 . "<br>" . $conn->error;
        }
    }
}





?>
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Profile</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="adprofile.php">Profile</a></li>
                        <li class="breadcrumb-item active">Edit-Profile</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="../upload_images/<?=$row['admin_image']?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3"><?= $row['firstname'] ?> <?= $row['lastname'] ?></h5>
                        <p class="text-muted mb-1 small"><?= $row['role'] ?></p>


                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-header" style="color: blue;">Profile Details</h5>
                        <?php
                        if ($flag == 2) {
                        ?>
                            <div class="alert alert-success " role="alert">
                                <?php echo $error_message1; ?>
                            </div>
                        <?php
                        } else if ($flag == 1) {
                        ?>
                            <div class="alert alert-danger p-1 text-danger" role="alert">
                                <?php echo $error_message1; ?>
                            </div>
                        <?php
                        }
                        ?>

                        <!-- Account -->


                        <div class="card-body">
                            <form action="edit-admin-profile.php" method="post" enctype="multipart/form-data">
                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                    <div class="form-group students-up-files">
                                        <label>Upload New Image</label>
                                        <div class="upload">
                                            <input class="form-control" type="file" id="formFile" name="admin_image" accept="image/png, image/jpeg">
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <hr class="my-0" />
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="inputEmail4" name="firstname" value="<?= $row['firstname'] ?>" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="inputEmail4"  name="lastname" value="<?= $row['lastname'] ?> " required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input type="text" class="form-control" id="inputPassword4" name="admin_email" value="<?= $row['admin_email'] ?>" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="phoneNumber">Phone Number</label>
                                    <div class="input-group input-group-merge">
                                        <!-- <span class="input-group-text">NEP (+977)</span> -->
                                        <input type="text" name='phone_number' class="form-control" name="phone_number" id="inputPassword4" value="<?= $row['phone_number'] ?>">
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="role" class="form-label">Role</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" name='role' class="form-control-plaintext" id="role" value=" <?= $row['role'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="role" class="form-label">Gender</label>
                                    <select id="role" name="gender" class="select2 form-select">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                                <div class="mt-2 text-center">
                                    <button type="submit" name="update" class="btn btn-primary me-2">Save changes</button>
                                    </form>
                                    <button type="reset" class="btn btn-outline-secondary"><a href="admin-profile.php"> Cancel</button></a>
                                </div>

                            </div>
                            <!-- /Account -->
                        </div>
                    </div>
                </div>
            </div>


            <?php include('head/footer.php')

            ?>