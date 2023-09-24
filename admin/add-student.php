<?php include('head/header.php');

$error_message1 = '';
$flag=0;
function validate_form($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if (isset($_POST['add_student'])) {
    $first_name = validate_form($_POST['first_name']);
    $middle_name = validate_form($_POST['middle_name']);
    $last_name = validate_form($_POST['last_name']);
    $gender = validate_form($_POST['gender']);
    $email = validate_form($_POST['student_email']);
    $phone = validate_form($_POST['phone']);
    $batch = validate_form($_POST['batch']);
    $college = validate_form($_POST['college']);
    $address = validate_form($_POST['address']);
    $university = validate_form($_POST['university']);
    $faculty = validate_form($_POST['faculty']);
    $project1_name = validate_form($_POST['project1_name']);
    $project1_description = validate_form($_POST['project1_description']);
    $project2_name = validate_form($_POST['project2_name']);
    $project2_description = validate_form($_POST['project2_description']);
    $student_image = $_FILES['student_image']['name'];
    if ($student_image === '') {
        $student_image = "2.png";
    }
    $sql = "SELECT * FROM student WHERE student_email='$email' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        $error_message1  = "Student already existed.";
        $flag = 1;
    } else {
        if (strlen($first_name) < 3) {
            $error_message1  = "First name should have more than 2 letters.";
            $flag = 1;
        } else if (($middle_name != '') && (strlen($middle_name) < 3)) {
            $error_message1  = "Middle name  should have more than 2  letters.";
            $flag = 1;
        } else if (strlen($last_name) < 3) {
            $error_message1  = "Last name  should have more than 2  letters.";
            $flag = 1;
        } else if ($batch == '') {
            $error_message1 = 'student must have batch.';
        } else {
            $sql = "INSERT INTO student (first_name, middle_name, last_name, gender, student_email, phone, batch, address, project1_name, project1_description, project2_name, project2_description, student_image)
         VALUES ('$first_name', '$middle_name', '$last_name', '$gender', '$email', '$phone', '$batch', '$address','$project1_name', '$project1_description', '$project2_name', '$project2_description', '$student_image');
        ";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                move_uploaded_file($_FILES['student_image']['tmp_name'], "../upload_images/$student_image");
                $flag = 2;
                $error_message1 = 'Successfully added.';
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
                <div class="col">
                    <h3 class="page-title">Add Student</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="student.php">Student</a>
                        </li>
                        <li class="breadcrumb-item active">Add Student</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="add-student.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title"><span>Student Details</span></h5>
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
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>First Name
                                            <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter  First Name" name="first_name" required />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label> Middle Name </label>
                                        <input type="text" class="form-control" placeholder="Enter Middle Name" name="middle_name" />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Last Name
                                            <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter Last Name" name="last_name" required />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Gender <span class="login-danger">*</span></label>
                                        <select class="form-control select" name="gender">
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Student Email
                                            <span class="login-danger">*</span></label>
                                        <input type="email" class="form-control" name="student_email" placeholder="Enter Email" required />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Phone Number
                                          </label>
                                        <input type="text" class="form-control" name="phone" placeholder="Enter Phone Number" />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Batch <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control" name="batch" placeholder="Enter Batch Year" required />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>College <span class="login-danger">*</span></label>
                                        <select class="form-control select" name="college">
                                            <option>United Technical College</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>University
                                            <span class="login-danger">*</span></label>
                                        <select class="form-control select" name="university">
                                            <option value="Pokhara University">Pokhara University</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Faculty <span class="login-danger">*</span></label>
                                        <select class="form-control select" name="faculty">
                                            <option value="BE Computer">BE Computer</option>
                                            <option value="BE Civil">BE Civil</option>
                                            <option value="BE Electrical & Electronics">BE Electrical & Electronics</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Address
                                        </label>
                                        <input type="text" class="form-control" name="address" placeholder="Enter Address" />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Project Name
                                        </label>
                                        <input type="text" class="form-control" name="project1_name" placeholder="Enter Your 1st Project Name" />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Project Description
                                        </label>
                                        <textarea name="project1_description" class="form-control" placeholder="Description of Project" cols="47" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Project Name
                                        </label>
                                        <input type="text" class="form-control" name="project2_name" placeholder="Enter Your 2nd Project Name" />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Project Description
                                        </label>
                                        <textarea name="project2_description" class="form-control" placeholder="Description of Project" cols="47" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="form-group students-up-files">
                                    <label>Upload student Images</label>
                                    <div class="upload">
                                        <input class="form-control" type="file" id="formFile" name="student_image" accept="image/png, image/jpeg">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="student-submit text-center">
                                        <button type="submit" name="add_student" class="btn btn-primary"><i class="bi bi-send"></i>
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('head/footer.php'); ?>