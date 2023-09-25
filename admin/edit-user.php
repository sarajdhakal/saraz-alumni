<?php include('head/header.php');

$error_message1 = '';
function validate_form($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if (!isset($_GET['user_id']) || empty($_GET['user_id'])) {
    header('Location: users.php');
    exit;
}
$user_id = validate_form($_GET['user_id']);
$flag = 0;
$sql = "SELECT * FROM users where user_id ='$user_id' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if (isset($_POST['add_user'])) {
    $firstname = validate_form($_POST['firstname']);
    $lastname = validate_form($_POST['lastname']);
    $email = validate_form($_POST['email']);
    $phone_number = validate_form($_POST['phone_number']);
    $role = validate_form($_POST['role']);
    $gender = validate_form($_POST['gender']);
    $enrollment_year = validate_form($_POST['enrollment_year']);
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
        $user_image = $row["user_image"];
    }
    if (strlen($firstname) < 3) {
        $error_message1  = "First name should have more than 2 letters.";
        $flag = 1;
    } else if (strlen($lastname) < 3) {
        $error_message1  = "Last name  should have more than 2  letters.";
        $flag = 1;
    } else if ($role == 'Alumni' && $pyear == '') {
        $flag = 1;
        $error_message1 = 'Alumni must enter passout year.';
    } else if ($role == 'Alumni' && $pyear != '') {
        if (($pyear - $enrollment_year) < 4) {
            $flag = 1;
            $error_message1 = 'Invalid passout year.';
        }
    } else if ($role == 'Student' && $pyear > 0) {
        $flag = 1;
        $error_message1 = 'Student cannot have passout year.';
    }

    if ($flag == 0) {
        $sql = "UPDATE users SET
        firstname= '$firstname',
        lastname='$lastname',
        email='$email',
        phone_number='$phone_number',
        role = '$role',
        gender='$gender',
        enrollment_year='$enrollment_year',
        passout_year = '$pyear', 
        adddress = '$address',
         college = '$college', 
         university = '$university', 
         faculty = '$faculty',
         work = '$work', 
         user_image= '$user_image',
         scmedia1 = '$scmedia1',
          scmedia2 = '$scmedia2' 
        WHERE user_id ='$user_id' ";
        $result = mysqli_query($conn, $sql);
        $flag = 2;
        if ($result) {
            move_uploaded_file($_FILES['user_image']['tmp_name'], "../upload_images/$user_image");
            $error_message1 = 'Successfully updated.';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
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
                        <h3 class="page-title">View/Edit Users</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="users.php">User</a></li>
                            <li class="breadcrumb-item active">View/Edit User</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card comman-shadow">
                    <div class="card-body">
                        <form action="edit-users.php?user_id=<?= $row['user_id'] ?>" method="post" enctype="multipart/form-data">
                            <div class="row">

                                <div class="col-12">
                                    <h5 class="form-title student-info">View/Edit User Information</h5>
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
                                <img src="../upload_images/<?= $row["user_image"] ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                <div class="col-12 col-sm-4">

                                    <div class="form-group students-up-files">
                                        <div class="form-group students-up-files">
                                            <label>Upload New Image</label>
                                            <div class="upload">
                                                <input class="form-control" type="file" id="formFile" name="user_image" accept="image/png, image/jpeg">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <p></p>
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
                                        <label>Phone Number <span class="login-danger">*</span> </label>
                                        <input class="form-control" type="text" placeholder=" Phone Number" value="<?= $row["phone_number"] ?>" name="phone_number" required>
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
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms ">
                                        <label>Enrollment year<span class="login-danger">*</span></label>
                                        <input type="number" name="enrollment_year" class="form-control" placeholder="YYYY" min="1999" max="2023" value="<?= $row["enrollment_year"] ?>" required>
                                        <script>
                                            document.querySelector("input[type=number]")
                                                .oninput = e => console.log(new Date(e.target.valueAsNumber, 0, 1))
                                        </script>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms ">
                                        <label>Passout year</label>
                                        <input type="number" name="passout_year" value="<?= $row["passout_year"] ?>" class="form-control" placeholder="YYYY" min="1999" max="2023">
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
                                            <option value="<?= $row["role"] ?>"><?= $row["role"] ?></option>
                                            <option value="Student">Student</option>
                                            <option value="Alumni">Alumni</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>E-Mail <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" name="email" placeholder=" Email Address" value="<?= $row["email"] ?>" required>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label for="inputPassword4" class="form-label">Address</label>
                                        <input type="text" class="form-control" name="adddress" placeholder=" Address" value="<?= $row["adddress"] ?>">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label for="inputPassword4" class="form-label">University</label>
                                        <input type="text" class="form-control" name="university" placeholder=" University" value="<?= $row["university"] ?>">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label for="inputPassword4" class="form-label">College</label>
                                        <input type="text" class="form-control" name="college" placeholder=" College" value="<?= $row["college"] ?>">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label for="inputPassword4" class="form-label">Faculty</label>
                                        <input type="text" class="form-control" name="faculty" placeholder=" Faculty" value="<?= $row["faculty"] ?>">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label for="inputPassword4" class="form-label">Work(If any)</label>
                                        <input type="text" class="form-control" name="work" placeholder=" Work" value="<?= $row["work"] ?>">
                                    </div>
                                </div>
                                <div class=" mb-3 col-12">
                                    <label for="inputAddress2" class="form-label">Social Media
                                        Contact</label>
                                    <input type="text" class="form-control" id="inputimage" name="scmedia1" placeholder="Add your Social Media Profile Link" value="<?= $row["scmedia1"] ?>">
                                </div>
                                <div class="mb-3 col-12">
                                    <label for="inputAddress2" class="form-label">Social Media
                                        Contact</label>
                                    <input type="text" class="form-control" id="inputimage" name="scmedia2" placeholder="Add your Social Media Profile Link(Any Other)" value="<?= $row["scmedia2"] ?>">
                                </div>


                            </div>
                            <div class="col-12 text-center">
                                <div class="student-submit">
                                    <button type="submit" name="add_user" class="btn btn-primary"><i class="bi bi-send"></i> Submit</button>

                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include('head/footer.php'); ?>