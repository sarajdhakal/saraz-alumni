<?php
include 'head/header.php';
$error_fname = $error_lname = $error_email = $error_pass = $error_rpass = $error_eyear = $error_pyear = $error_message = $error_message1 = '';
$flag = 0;
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
    $email = validate_form($_POST['email']);
    $phone = validate_form($_POST['phone_number']);
    $pass = validate_form($_POST['password']);
    $rpass = validate_form($_POST['rpassword']);
    $role = validate_form($_POST['role']);
    $gender = validate_form($_POST['gender']);
    $eyear = validate_form($_POST['enrollment_year']);
    $pyear = validate_form($_POST['passout_year']);
    $address = validate_form($_POST['adddress']);
    $college = validate_form($_POST['college']);
    $university = validate_form($_POST['university']);
    $faculty = validate_form($_POST['faculty']);
    $work = validate_form($_POST['work']);
    $scmedia1 = validate_form($_POST['scmedia1']);
    $scmedia2 = validate_form($_POST['scmedia2']);
    $user_image = $_FILES['user_image']['name'];
    if ($user_image === '') {
        $user_image = "2.png";
    }
    $sql = "SELECT * FROM users WHERE email='$email' ";
    $result = $conn->query($sql);
    $flag = 0;
    if ($result->num_rows > 0) {
        // output data of each row
        $error_message1 = "User already existed.";
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
        } else if (strlen($pass) < 8) {
            $error_message1 = "Password must be at least 8 characters";
            $flag = 1;
        } else if (!preg_match("/[a-z]/i", $pass)) {
            $error_message1 = ' Password must contain at least one letter';
            $flag = 1;
        } else if (!preg_match("/[0-9]/", $pass)) {
            $error_message1 = 'Password must contain at least one number';
            $flag = 1;
        } else if ($role == 'Alumni' && $pyear == '') {
            $error_message1 = 'Alumni must enter passout year.';
            $flag = 1;
        } else if ($role == 'Alumni' && $pyear != '') {
            if (($pyear - $eyear) < 4) {
                $error_message1 = 'Invalid passout year.';
                $flag  = 1;
            }
        } else if ($role == 'Student' && $pyear > 0) {
            $error_message1 = 'Student cannot have passout year.';
            $flag =  1;
        }
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        if ($flag == 0) {
            move_uploaded_file($_FILES['user_image']['tmp_name'], "../upload_images/$user_image");
            $sql = "INSERT INTO users (firstname, lastname, email, phone_number,password,role,gender,enrollment_year,passout_year,adddress,college,university,faculty,work,scmedia1,scmedia2,user_image) 
                   VALUES ('$fname', '$lname', '$email', '$phone','$pass','$role','$gender','$eyear','$pyear', '$address','$college','$university','$faculty','$work', 
 '$scmedia1','$scmedia2','$user_image' )";
            if ($conn->query($sql) === true) {
                $flag = 2;
                $error_message1 = 'Successfully registered.';
                // header('location:add-user.php');
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
                        <h3 class="page-title">Add Users</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="user.html">User</a></li>
                            <li class="breadcrumb-item active">Add Users</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card comman-shadow">
                    <div class="card-body">
                        <form action="add-user.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title student-info">User Information</h5>
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
                                        <label>Password <span class="login-danger">*</span></label>
                                        <input class="form-control" type="password" placeholder=" Password" name="password" required>
                                        <small id="passwordHelpBlock" class="form-text text-muted">
                                       Must be at least 8 characters with at least one letter & number.
                                        </small>
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
                                        <label>Phone Number </label>
                                        <input class="form-control" type="text" placeholder=" Phone Number" name="phone_number" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Gender <span class="login-danger">*</span></label>
                                        <select class="form-control select" name="gender">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms ">
                                        <label>Enrollment year<span class="login-danger">*</span></label>
                                        <input type="number" name="enrollment_year" class="form-control" placeholder="YYYY" min="1999" max="2023" required>
                                        <script>
                                            document.querySelector("input[type=number]")
                                                .oninput = e => console.log(new Date(e.target.valueAsNumber, 0, 1))
                                        </script>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms ">
                                        <label>Passout year</label>
                                        <input type="number" name="passout_year" class="form-control" placeholder="YYYY" min="1999" max="2023">
                                        <script>
                                            document.querySelector("input[type=number]")
                                                .oninput = e => console.log(new Date(e.target.valueAsNumber, 0, 1))
                                        </script>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Role <span class="login-danger">*</span></label>
                                        <select class="form-control select" name="role">
                                            <option value="Student">Student</option>
                                            <option value="Alumni">Alumni</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>E-Mail <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" name="email" placeholder=" Email Address" required>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label for="inputPassword4" class="form-label">Address</label>
                                        <input type="text" class="form-control" name="adddress" placeholder=" Address" value="">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label for="inputPassword4" class="form-label">University</label>
                                        <input type="text" class="form-control" name="university" placeholder=" University" value="">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label for="inputPassword4" class="form-label">College</label>
                                        <input type="text" class="form-control" name="college" placeholder=" College" value="">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label for="inputPassword4" class="form-label">Faculty</label>
                                        <input type="text" class="form-control" name="faculty" placeholder=" Faculty" value="">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label for="inputPassword4" class="form-label">Work(If any)</label>
                                        <input type="text" class="form-control" name="work" placeholder=" Work" value=""">
                                        </div>
                                     </div>
                                        <div class=" mb-3 col-12">
                                        <label for="inputAddress2" class="form-label">Social Media
                                            Contact</label>
                                        <input type="text" class="form-control" id="inputimage" name="scmedia1" placeholder="Add your Social Media Profile Link" value="">
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label for="inputAddress2" class="form-label">Social Media
                                            Contact</label>
                                        <input type="text" class="form-control" id="inputimage" name="scmedia2" placeholder="Add your Social Media Profile Link(Any Other)" value="">
                                    </div>

                                    <div class="form-group students-up-files">
                                        <label>Upload User Image</label>
                                        <div class="upload">
                                            <input class="form-control" type="file" id="formFile" name="user_image" accept="image/png, image/jpeg">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <div class="student-submit">
                                        <button type="submit" class="btn btn-primary"><i class="bi bi-send"></i> Submit</button>

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