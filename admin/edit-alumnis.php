<?php include('head/header.php');
$error_message1 = '';
function validate_form($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if (!isset($_GET['alumni_id']) || empty($_GET['alumni_id'])) {
    header('Location: alumni.php');
    exit;
}
$alumni_id = validate_form($_GET['alumni_id']);
$flag = 0;
$sql = "SELECT * FROM alumni where alumni_id ='$alumni_id' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if (isset($_POST['add_alumni'])) {
    $first_name = validate_form($_POST['first_name']);
    $middle_name = validate_form($_POST['middle_name']);
    $last_name = validate_form($_POST['last_name']);
    $gender = validate_form($_POST['gender']);
    $email = validate_form($_POST['alumni_email']);
    $phone = validate_form($_POST['phone']);
    $batch = validate_form($_POST['batch']);
    $college = validate_form($_POST['college']);
    $address = validate_form($_POST['address']);
    $university = validate_form($_POST['university']);
    $faculty = validate_form($_POST['faculty']);
    $company = validate_form($_POST['company']);
    $post = validate_form($_POST['post']);
    $project1_name = validate_form($_POST['project1_name']);
    $project1_description = validate_form($_POST['project1_description']);
    $project2_name = validate_form($_POST['project2_name']);
    $project2_description = validate_form($_POST['project2_description']);
    $alumni_image = $_FILES['alumni_image']['name'];
    if ($alumni_image === '') {
        $alumni_image = $row["alumni_image"];
    }
    if (strlen($first_name) < 3) {
        $error_message1  = "First name should have more than 2 letters.";
        $flag = 1;
    } else if (($middle_name!='' ) && (strlen($middle_name) < 3)) {
        $error_message1  = "Middle name  should have more than 2  letters.";
        $flag = 1;
    } else if  (strlen($last_name) < 3) {
        $error_message1  = "Last name  should have more than 2  letters.";
        $flag = 1;
    } else if ($batch == '') {
        $error_message1 = 'Alumni must have batch.';
    } else {
        $sql = "UPDATE alumni SET
        first_name = '$first_name',
        middle_name= '$middle_name',
        last_name ='$last_name',
        gender= '$gender',
        alumni_email='$email',
        phone ='$phone',
        batch= '$batch', 
        address= '$address',
        post ='$post',
        company='$company',
        project1_name='$project1_name',
        project1_description='$project1_description',
        project2_name='$project2_name',
        project2_description='$project2_description',
         alumni_image = '$alumni_image'
        WHERE alumni_id ='$alumni_id' ";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            move_uploaded_file($_FILES['alumni_image']['tmp_name'], "../upload_images/$alumni_image");
            $flag= 2;
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
                <div class="col">
                    <h3 class="page-title">Add Alumni</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="alumni.php">Alumni</a>
                        </li>
                        <li class="breadcrumb-item active">Add Alumni</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="edit-alumnis.php?alumni_id=<?= $row['alumni_id'] ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title"><span>Alumni Details</span></h5>
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
                                <img src="../upload_images/<?= $row["alumni_image"] ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                <div class="col-12 col-sm-4">
                                
                                <div class="form-group students-up-files">
                                <div class="form-group students-up-files">
                                <label>Upload New Image</label>
                                <div class="upload">
                                    <input class="form-control" type="file" id="formFile" name="alumni_image" accept="image/png, image/jpeg">
                                </div>
                            </div>
                                </div>
                            
                            </div>

                                <p></p>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>First Name
                                            <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter  First Name" name="first_name" value="<?= $row['first_name'] ?>" required />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label> Middle Name </label>
                                        <input type="text" class="form-control" name="middle_name" placeholder="Enter Middle Name" value="<?= $row['middle_name'] ?>" />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Last Name
                                            <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name" value="<?= $row['last_name'] ?>" required />

                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Gender <span class="login-danger">*</span></label>
                                        <select class="form-control select" name="gender">
                                            <option value="<?= $row['gender'] ?>"><?= $row['gender'] ?></option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Alumni Email
                                            <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" name="alumni_email" value=" <?= $row['alumni_email'] ?>" placeholder="Email Address" required />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Phone Number
                                            <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control" name="phone" value="<?= $row['phone'] ?>" placeholder="Enter Phone Number" />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Address  
                                            <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control" name="address" value="<?= $row['address'] ?>" placeholder="Address" />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Batch <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control" name="batch" value="<?= $row['batch'] ?>" placeholder="Enter Batch Year" required />
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
                                            <option>Pokhara University</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Faculty <span class="login-danger">*</span></label>
                                        <select class="form-control select" name="faculty">
                                            <option>BE Computer</option>
                                            <option>BE Civil</option>
                                            <option>BE Electrical & Electronics</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Designation
                                        </label>
                                        <input type="text" class="form-control" name="post" placeholder="Enter Your Designation" />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Company</label>
                                        <input type="text" class="form-control" name="company" value="<?= $row['company'] ?>" placeholder="Enter Your Company" />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Project Name
                                        </label>
                                        <input type="text" class="form-control" name="project1_name" <?= $row['project1_name'] ?> placeholder="Enter Your 1st Project Name" />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Project Description
                                        </label>
                                        <textarea name="project1_description" name="project1_description" class="form-control" placeholder="Description of Project" cols="47" rows="3"><?= $row['project1_description'] ?></textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Project Name
                                        </label>
                                        <input type="text" class="form-control" name="project2_name" value="<?= $row['project2_name'] ?>" placeholder="Enter Your 2nd Project Name" />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Project Description
                                        </label>
                                        <textarea name="project2_description" name="project2_description" class="form-control" placeholder="Description of Project" cols="47" rows="3"><?= $row['project2_description'] ?></textarea>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="student-submit text-center">
                                        <button type="submit" class="btn btn-primary" name="add_alumni"><i class="bi bi-send"></i>
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