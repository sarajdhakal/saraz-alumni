<?php
session_start();
include('head/header.php');
include('../config/db.php');
$error_message1 = '';
$id = 0;
function validate_form($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if (isset($_POST['edit'])) {
  $testimonials_id = $_POST['testimonials_id'];
  $sql = "SELECT * FROM testimonials where testimonials_id='$testimonials_id'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
}
if (isset($_POST['add'])) {
  $testimonials_name = validate_form($_POST['testimonials_name']);
  $post = validate_form($_POST['post']);
  $description = validate_form($_POST['description']);
  $user_image = $_FILES['testimonials_image']['name'];
  if ($user_image === '') {
    $user_image = $row["testimonials_image"];
}
  if (strlen($testimonials_name) < 3) {
    $error_message1 = "Testimonials name shoould be greater than 2 letters.";
    $flag = 1;
  }
  if ($flag == 0) {
    move_uploaded_file($_FILES['testimonials_image']['tmp_name'], "upload_images/$user_image");
    $sql1= "UPDATE  testimonials Set testimonials_name='$testimonials_name', post='$post', testimonials_image='$user_iamge', description='$description' 
      where testimonials_id='$testimonials_id' ";
      echo $sql1;
      die();
    if ($conn->query($sql1) === true) {
      $error_message1 = 'Successfully inserted.';
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
            <h3 class="page-title">Edit/View Testimonials</h3>
            <ul class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="testimonials.html">Testimonial</a>
              </li>
              <li class="breadcrumb-item active">Edit/View Testimonials</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <div class="card comman-shadow">
          <div class="card-body">
            <form action="edit-testimonials.php" method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-12">
                  <h5 class="form-title student-info">
                    Edit/View Testimonial Information

                  </h5>
                </div>
              
                <p class="font-weight-normal " style=" color:red;"><?php echo $error_message1; ?></p>

                <div class="form-group local-forms">

                  <img src="../upload_images/<?= $row["testimonials_image"] ?>" alt="User Image" class="img-fluid img-thumbnail">

                </div>

                <div class="col-12 col-sm-4">
                  <div class="form-group local-forms">
                    <label>Edit Name
                      <span class="login-danger">*</span></label>
                    <input class="form-control" type="text" placeholder="Name" name="testimonials_name" value="<?= $row["testimonials_name"] ?>" />
                  </div>
                </div>

                <div class="col-12 col-sm-4">
                  <div class="form-group local-forms">
                    <label>Edit Post
                      <span class="login-danger">*</span></label>
                    <input class="form-control" type="text" placeholder="Post" name="post" value="<?= $row["post"] ?>" />
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="form-group local-forms">
                    <label>Edit Description </label>
                    <input class="form-control" type="text" placeholder="Description of Testimonial" name="description" value="<?= $row["description"] ?>" />
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="form-group students-up-files">
                    <label>Edit Testimonial Photo</label>
                    <div class="uplod">

                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                <span class="d-none d-sm-block">Upload new photo</span>
                                                <i class="bx bx-upload d-block d-sm-none"></i>
                                                <input type="file" id="upload" name="testimonials_image" class="account-file-input" hidden accept="image/png, image/jpeg" />
                                            </label>
                                            <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                    </div>
                  </div>
                </div>

                <div class="col-12">
                  <div class="student-submit">
                    
                    <button type="submit" name="add" class="btn btn-primary"><i class="bi bi-send"></i> Submit
                    </button>
            </form>
            <form action="delete.php" method="post">
              <input type="hidden" name="testimonials_id" value="<?= $row["testimonials_id"] ?>">
              <button type="submit" name="delete" class="btn btn-primary m-1"><i class="bi bi-trash3"></i> Delete </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<?php include('head/footer.php'); ?>