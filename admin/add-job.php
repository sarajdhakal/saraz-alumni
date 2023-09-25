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

if ($_POST) {
  $job_title = validate_form($_POST['job_title']);
  $organization = validate_form($_POST['organization']);
  $alumni_name = validate_form($_POST['alumni_name']);
  $alumni_email = validate_form($_POST['alumni_email']);
  $vacant_seats = validate_form($_POST['vacant_seats']);
  $type = validate_form($_POST['type']);
  $due_date=validate_form($_POST['due_date']);
  $description = validate_form($_POST['description']);
  $qualification = validate_form($_POST['qualification']);
  $banner_image = $_FILES['banner_image']['name'];
  move_uploaded_file($_FILES['banner_image']['tmp_name'], "../upload_images/$banner_image");
  if ($banner_image === '') {
      $banner_image = $row["banner_image"];
  }
  if ($flag == 0) {
    $sql = "INSERT INTO jobs (job_title, organization,alumni_name,alumni_email,type,vacant_seats,due_date, description,qualification,banner_image) 
         VALUES ('$job_title','$organization','$alumni_name','$alumni_email','$type','$vacant_seats','$due_date','$description', '$qualification','$banner_image')";
    if ($conn->query($sql) === true) {
        $flag=2;
      $error_message1 = 'Successfully added job.';
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
                    <h3 class="page-title">Add Jobs</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="events.php">Jobs</a></li>
                        <li class="breadcrumb-item active">Add Jobs</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="add-job.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title"><span>Jobs Information</span></h5>
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
                                        <label>Job Title <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control" name="job_title" id="inputEmail4" placeholder="Job Title">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Organization <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control" name="organization" id="inputPassword4" placeholder="Organization" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Alumni Name <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control" id="inputEmail4" name="alumni_name" placeholder="Alumni Name" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Alumni Email <span class="login-danger">*</span></label>
                                        <input type="email" class="form-control" id="inputPassword4" name="alumni_email" placeholder="Alumni Email" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Type <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control" id="inputEmail4" name="type" placeholder="Eg: Sales And Marketing" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Due date to apply <span class="login-danger">*</span></label>
                                        <input type="date" class="form-control" id="inputPassword4" name="due_date" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Vacant Seats <span class="login-danger">*</span></label>
                                        <input type="number" class="form-control" id="inputEmail4" name="vacant_seats" placeholder="Vacant Seats" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Description <span class="login-danger">*</span></label>
                                        <textarea class="form-control" rows="4" cols="50" name="description" placeholder="Description of Jobs" required></textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Required Qualification <span class="login-danger">*</span></label>
                                        <textarea class="form-control" rows="4" cols="50" name="qualification" placeholder="Qualification for Jobs" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group students-up-files">
                                    <label>Upload Jobs Images</label>
                                    <div class="upload">
                                    <input class="form-control" type="file" id="formFile" name="banner_image" accept="image/png, image/jpeg">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="student-submit text-center">
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
</div>

<?php include('head/footer.php'); ?>