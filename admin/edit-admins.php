<?php
include 'head/header.php';
$error_message1 = '';
$sql1 = "SELECT * FROM admin where admin_email='" . $_SESSION['admin_email'] . " ' ";
$admin_email = $_SESSION['admin_email'];
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();

function validate_form($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if (!isset($_GET['admin_id']) || empty($_GET['admin_id'])) {
    header('Location: admin.php');
    exit;
}
$admin_id = validate_form($_GET['admin_id']);
$flag = 0;
$sql = "SELECT * FROM admin where admin_id ='$admin_id' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if (isset($_POST['add_admin'])) {
    $firstname = validate_form($_POST['firstname']);
    $lastname = validate_form($_POST['lastname']);
    $email = validate_form($_POST['admin_email']);
    $phone_number = validate_form($_POST['phone_number']);
    $role = validate_form($_POST['role']);
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
        $sql1 = "UPDATE  admin Set firstname='$firstname', lastname='$lastname', admin_email='$email', phone_number='$phone_number', role='$role', gender='$gender', admin_image='$admin_image' 
        where admin_id='$admin_id' ";

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
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">View/Edit Admin</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin.php">Admin</a></li>
                            <li class="breadcrumb-item active">View/Edit Admin</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card comman-shadow">
                    <div class="card-body">
                        <form action="edit-admins.php?admin_id=<?= $row['admin_id'] ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title student-info">View/Edit Admin Information</h5>
                                </div>

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

                                <img src="../upload_images/<?= $row["admin_image"] ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                <div class="col-12 col-sm-4">

                                    <div class="form-group students-up-files">
                                        <div class="form-group students-up-files">
                                            <label>Upload New Image</label>
                                            <div class="upload">
                                                <input class="form-control" type="file" id="formFile" name="admin_image" accept="image/png, image/jpeg">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <p class="font-weight-normal " style=" color:red;"></p>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>First Name <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" placeholder=" First Name" name="firstname" value="<?= $row["firstname"] ?>" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Last Name <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" placeholder=" Last Name" name="lastname" value="<?= $row["lastname"] ?>" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>E-Mail <span class="login-danger">*</span></label>
                                        <input class="form-control" type="email" name="admin_email" placeholder=" Email Address" value="<?= $row["admin_email"] ?>" required>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Phone Number<span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" placeholder=" Phone Number" name="phone_number" value="<?= $row["phone_number"] ?>" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Role <span class="login-danger">*</span></label>
                                        <?php
                                if  (($row['role']) == 'Super Admin') {
                                ?>
                                    <input type="text" class="form-control" name="role" id="" value="Super Admin" readonly>
                                <?php
                                } else if (($row['role']) != 'Super Admin') {
                                ?>
                                    <select class="form-control select" name="role">
                                                <option value="<?= $row["role"] ?>"><?= $row["role"] ?></option>
                                                <option value="Admin">Admin</option>
                                                <?php
                                if  (($row1['role']) == 'Super Admin') {
                                ?>
                                                <option value="Alumni">Super Admin</option>
                                        <?php } ?>
                                            </select>
                                <?php
                                }
                                ?>
                                       

                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Gender <span class="login-danger">*</span></label>
                                        <select class="form-control select" name="gender">
                                            <option value="<?= $row["gender"] ?>"><?= $row["gender"] ?></option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Others">Others</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-center">

                                <div class="student-submit">
                                    <button type="submit" name="add_admin" class="btn btn-primary"> <i class="bi bi-send"></i> Submit</button>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
include 'head/footer.php';
?>