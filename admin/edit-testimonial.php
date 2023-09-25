<?php
include('head/header.php');
$error_message1 = '';
$id = 0;
function validate_form($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if (!isset($_GET['testimonials_id']) || empty($_GET['testimonials_id'])) {
  header('Location: testimonials.php');
  exit;
}
$testimonials_id = validate_form($_GET['testimonials_id']);
$flag = 0;
$sql = "SELECT * FROM testimonials where testimonials_id ='$testimonials_id' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if (isset($_POST['add_testimonials'])) {
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
    move_uploaded_file($_FILES['testimonials_image']['tmp_name'], "../upload_images/$user_image");
    $sql1 = "UPDATE  testimonials Set testimonials_name='$testimonials_name', post='$post', testimonials_image='$user_image', description='$description' 
      where testimonials_id='$testimonials_id' ";

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
            <form action="edit-testimonials.php?testimonials_id=<?= $row['testimonials_id'] ?>" method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-12">
                  <h5 class="form-title student-info">
                    Edit/View Testimonial Information

                  </h5>
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
                <img src="../upload_images/<?= $row["testimonials_image"] ?>" alt="User Image" class="rounded-circle img-fluid" style="width: 150px;">
                <div class="col-12 col-sm-4">
                                
                                    <div class="form-group students-up-files">
                                    <div class="form-group students-up-files">
                                    <label>Upload New Image</label>
                                    <div class="upload">
                                        <input class="form-control" type="file" id="formFile" name="testimonials_image" accept="image/png, image/jpeg">
                                    </div>
                                </div>
                                    </div>
                                
                                </div>
                <p class="font-weight-normal " style=" color:red;"></p>

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
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Description of Testimonial" name="description"> <?= $row["description"] ?></textarea>
                  </div>
                </div>

                <div class="col-12">
                  <div class="student-submit text-center">
                    <input type="hidden" name="testimonials_id" value="<?= $row['testimonials_id'] ?>">
                    <button type="submit" name="add_testimonials" class="btn btn-primary"><i class="bi bi-send"></i> Submit
                    </button>
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