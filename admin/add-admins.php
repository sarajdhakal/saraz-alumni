<?php
include 'head/header.php';
$sql1 = "SELECT * FROM admin where admin_email='" . $_SESSION['admin_email'] . " ' ";
$admin_email = $_SESSION['admin_email'];
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();

$error_fname = $error_lname = $error_email = $error_pass = $error_rpass = $error_eyear = $error_pyear = $error_message = $error_message1 = '';
function validate_form($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$flag = 0;
if ($_POST) {
    $fname = validate_form($_POST['firstname']);
    $lname = validate_form($_POST['lastname']);
    $admin_email = validate_form($_POST['admin_email']);
    $phone = validate_form($_POST['phone_number']);
    $pass = validate_form($_POST['password']);
    $rpass = validate_form($_POST['rpassword']);
    $role = validate_form($_POST['role']);
    $admin_image = $_FILES['admin_image']['name'];
    if ($admin_image === '') {
        $admin_image = "2.png";
    }
    $sql = "SELECT * FROM admin WHERE admin_email='$admin_email' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        $error_message1 = "Admin already existed.";
    } else {
        if (strlen($fname) < 3) {
            $error_message1 = "First name > 2 letters.";
            $flag = 1;
        } else if (strlen($lname) < 3) {
            $error_message1 = "Last name > 2 letters.";
            $flag = 1;
        } else if ($pass != $rpass) {
            $error_message1 = "Password not matched";
            $flag = 1;
        }
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        if ($flag == 0) {
            $sql = "INSERT INTO admin (firstname, lastname,password, admin_email, phone_number,role,admin_image) 
                   VALUES ('$fname', '$lname', '$pass', '$admin_email','$phone','$role','$admin_image' )";
            if ($conn->query($sql) === true) {
                move_uploaded_file($_FILES['admin_image']['tmp_name'], "../upload_images/$admin_image");
                $flag = 2;
                $error_message1 = 'Successfully registered.';
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
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
                        <h3 class="page-title">Add Admin</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Admin</a></li>
                            <li class="breadcrumb-item active">Add Admin</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card comman-shadow">
                    <div class="card-body">
                        <form action="add-admins.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title student-info">Admin Information</h5>
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
                                <p class="font-weight-normal " style=" color:red;"></p>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>First Name <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" placeholder=" First Name" name="firstname" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Last Name <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" placeholder=" Last Name" name="lastname" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>E-Mail <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" name="admin_email" placeholder=" Email Address" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Password <span class="login-danger">*</span></label>
                                        <input class="form-control" type="password" placeholder=" Password" name="password" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Repeat Password <span class="login-danger">*</span></label>
                                        <input class="form-control" type="password" placeholder=" Repeat Password" name="rpassword" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Phone Number<span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" placeholder=" Phone Number" name="phone_number" required>
                                    </div>
                                </div>


                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Role <span class="login-danger">*</span></label>
                                        <select class="form-control select" name="role">
                                            <option value="Admin">Admin</option>
                                            <?php if (($row1["role"]) == "Super Admin") { ?>
                                                <option value="Super Admin">Super Admin</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group students-up-files">
                                <label>Upload Admin Image</label>
                                <div class="upload">
                                    <input class="form-control" type="file" id="formFile" name="admin_image" accept="image/png, image/jpeg">
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <div class="student-submit">
                                    <button type="submit" class="btn btn-primary">Submit</button>

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