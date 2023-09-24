<?php
include 'head/header.php';
$error_message1 = '';
function validate_form($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: jobs.php');
    exit;
}
$job_id = validate_form($_GET['id']);
$flag = 0;
$error_message1= "Error in updating.";
$sql = "SELECT * FROM jobs where job_id ='$job_id' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
if (isset($_POST['add_jobs'])) {
    $job_title = validate_form($_POST['job_title']);
    $organization = validate_form($_POST['organization']);
    $alumni_name = validate_form($_POST['alumni_name']);
    $email = validate_form($_POST['alumni_email']);
    $type = validate_form($_POST['type']);
    $vacant_seats = validate_form($_POST['vacant_seats']);
    $due_date = validate_form($_POST['due_date']);
    $description = validate_form($_POST['description']);
    $qualification = validate_form($_POST['qualification']);
    $banner_image = $_FILES['banner_image']['name'];
    if ($banner_image === '') {
        $banner_image = $row["banner_image"];
    }
    if ($flag == 0) {
        move_uploaded_file($_FILES['banner_image']['tmp_name'], "../upload_images/$banner_image");
        $sql1 = "UPDATE  jobs Set job_title='$job_title', organization='$organization', alumni_name='$alumni_name', alumni_email='$email', type='$type', vacant_seats='$vacant_seats',
            due_date= $due_date,
         banner_image='$banner_image', description='$description' , qualification= '$qualification'
        where job_id='$job_id' ";
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
                        <div class="col">
                            <h3 class="page-title">View/Edit Jobs</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="jobs.php">Jobs</a></li>
                                <li class="breadcrumb-item active">View/Edit Jobs</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="edit-jobs.php?id=<?=$row['job_id']?>" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="form-title"><span>View/Edit Jobs Information</span></h5>
                                            
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
                                        <img src="../upload_images/<?=$row["banner_image"] ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                        <div class="col-12 col-sm-4">
                                    <div class="form-group students-up-files">
                                        <label>Edit Jobs Photo</label>
                                        <div class="uplod">

                                            <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                <span class="d-none d-sm-block">Upload new photo</span>
                                                <i class="bx bx-upload d-block d-sm-none"></i>
                                                <input type="file" id="upload" name="banner_image" class="account-file-input" hidden accept="image/png, image/jpeg" />
                                            </label>
                                            <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                        </div>
                                    </div>
                                </div>
                                <p class="font-weight-normal " style=" color:red;"></p>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Job Title <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="inputEmail4" name="job_title" placeholder="Job Title" value="<?= $row["job_title"] ?>" required>                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Organization <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="inputPassword4"  name="organization" value="<?= $row["organization"] ?>" placeholder="Organization" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Alumni Name <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="inputEmail4" name="alumni_name" value="<?= $row["alumni_name"] ?>" placeholder="Alumni Name" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Alumni Email <span class="login-danger">*</span></label>
                                                <input type="email" class="form-control" id="inputPassword4" name="alumni_email" value="<?= $row["alumni_email"] ?>" placeholder="Alumni Email" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Type <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="inputEmail4" name="type" value="<?= $row["type"] ?>" placeholder="Eg: Sales And Marketing" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Due date to apply <span class="login-danger">*</span></label>
                                                <input type="date" class="form-control" id="date" name="due_date" value="<?= $row["due_date"] ?>" required>
                                            </div>
                                        </div>     
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Vacant Seats <span class="login-danger">*</span></label>
                                                <input type="number" class="form-control" id="inputEmail4" name="vacant_seats" value="<?= $row["vacant_seats"] ?>" placeholder="Vacant Seats" required>
                                            </div>
                                        </div>                                
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Description <span class="login-danger">*</span></label>
                                                <textarea class="form-control" rows="4" cols="50" name="description" placeholder="Description of Job" required><?= $row["description"] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Required Qualification <span class="login-danger">*</span></label>
                                                <textarea class="form-control" rows="4" cols="50" name="qualification" placeholder="Qualification For Job" required><?= $row["qualification"] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="student-submit text-center">
                                            <button type="submit" name="add_jobs" class="btn btn-primary"> <i class="bi bi-send"></i> Submit</button>
                                                </form>
                                            </div>
                                            
                                                    
                                        </div>
                                    </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php include ('head/footer.php');
?>