<?php
include 'head/header.php';
$error_fname = $error_lname = $error_email = $error_pass = $error_rpass = $error_eyear = $error_pyear = $error_message = $error_message1 = '';
function validate_form($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if ($_POST) {
    $fname = validate_form($_POST['firstname']);
    $lname = validate_form($_POST['lastname']);
    $admin_email = validate_form($_POST['admin_email']);
    $phone = validate_form($_POST['phone_number']);
    $pass = validate_form($_POST['password']);
    $rpass = validate_form($_POST['rpassword']);
    $role = validate_form($_POST['role']);
    $sql = "SELECT * FROM admin WHERE admin_email='$admin_email' ";
    $result = $conn->query($sql);
    $flag = 0;
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
            $sql = "INSERT INTO admin (firstname, lastname,password, admin_email, phone_number,role) 
                   VALUES ('$fname', '$lname', '$pass', '$admin_email','$phone','$role' )";
            if ($conn->query($sql) === true) {
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
                                <p class="font-weight-normal " style=" color:red;"><?php echo $error_message1; ?></p>
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
                                            <option value="Super Admin">Super Admin</option>
                                        </select>
                                    </div>
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