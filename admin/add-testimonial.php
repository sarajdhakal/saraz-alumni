<?php include 'head/header.php';
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
  $testimonials_name = validate_form($_POST['testimonials_name']);
  $post = validate_form($_POST['post']);
  $description = validate_form($_POST['description']);
  $testimonials_image = $_FILES['testimonials_image']['name'];
    if ($testimonials_image === '') {
        $testimonials_image = "2.png";
    }

  if (strlen($testimonials_name) < 3) {
    $error_message1 = "Testimonials name shoould be greater than 2 letters.";
    $flag = 1;
  }
  if ($flag == 0) {
    $sql = "INSERT INTO testimonials (testimonials_name, post, description,testimonials_image) 
         VALUES ('$testimonials_name', '$post', '$description','$testimonials_image')";
         
    if ($conn->query($sql) === true) {
      move_uploaded_file($_FILES['testimonials_image']['tmp_name'], "../upload_images/$testimonials_image");
      $flag = 2;
      $error_message1 = 'Successfully added.';
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
            <h3 class="page-title">Add Testimonials</h3>
            <ul class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="testimonials.html">Testimonial</a>
              </li>
              <li class="breadcrumb-item active">Add Testimonials</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <div class="card comman-shadow">
          <div class="card-body">
            <form action="add-testimonial.php" method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-12">
                  <h5 class="form-title student-info">
                    Testimonial Information

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
                <p class="font-weight-normal " style=" color:red;"></p>
                <div class="col-12 col-sm-4">
                  <div class="form-group local-forms">
                    <label>Name
                      <span class="login-danger">*</span></label>
                    <input class="form-control" type="text" placeholder="Enter Name" name="testimonials_name" />
                  </div>
                </div>

                <div class="col-12 col-sm-4">
                  <div class="form-group local-forms">
                    <label>Enter Post
                      <span class="login-danger">*</span></label>
                    <input class="form-control" type="text" placeholder="Post" name="post" />
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="form-group local-forms">
                    <label>Description </label>
                    <input class="form-control" type="text" placeholder="Description of Testimonial" name="description" />
                  </div>
                </div>

                <div class="form-group students-up-files">
                                <label>Upload Testimonial Image</label>
                                <div class="upload">
                                    <input class="form-control" type="file" id="formFile" name="testimonials_image" accept="image/png, image/jpeg">
                                </div>
                            </div>

                <div class="col-12">
                  <div class="student-submit text-center">
                    <button type="submit" class="btn btn-primary">
                    <i class="bi bi-send"></i>  Submit
                      </form>
                    </button>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <?php
  include 'head/footer.php';
  ?>