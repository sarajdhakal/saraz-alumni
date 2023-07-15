<?php
session_start();
$error_pyear = $error_message = $error_message1 = '';

if (!isset($_SESSION['is_login']) && $_SESSION == false) {
  header('Location:login.php');
}

?>
<?php
include 'head/header.php';
include 'config/db.php';

$sql = "SELECT * FROM users where email='" . $_SESSION['email'] . " ' ";
$email = $_SESSION['email'];
$result = $conn->query($sql);
$row = $result->fetch_assoc();


function validate_form($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if ($_POST) {
  $phone = validate_form($_POST['phone_number']);
  $role = validate_form($_POST['role']);
  $pyear = validate_form($_POST['passout_year']);
  $address = validate_form($_POST['adddress']);
  $university = validate_form($_POST['university']);
  $college = validate_form($_POST['college']);
  $faculty = validate_form($_POST['faculty']);
  $work = validate_form($_POST['work']);
  $scmedia1 = validate_form($_POST['scmedia1']);
  $scmedia2 = validate_form($_POST['scmedia2']);
  $existingPhoneNumber = $row['phone_number'];
  $flag=0;
  $newPhoneNumber = isset($_POST['phone_number']) ? $_POST['phone_number'] : $existingPhoneNumber;
  if (($role == 'Student') and $pyear >= 1999) {
    $error_message1 = "Students can't have passout year";

  } else if (preg_match('~[0-9]+~', $university)) {
    $error_message1='Invalid University';
    $flag=1;
  } else if (preg_match('~[0-9]+~', $college)) {
    $error_message1='Invalid College';
    $flag=1;
  } else if (preg_match('~[0-9]+~', $faculty)) {
    $error_message1='Invalid Faculty';
    $flag=1;
  }
//  else if(($role =='Alumni') && ($pyear - $eyear <= 3 )){
//       $error_message1="Invalid Enrollment Year or Passout Year";
//       $flag=1;
//     }

    if($flag==0){
      $query = "UPDATE users SET
      phone_number = '$newPhoneNumber',
      role = '$role',
      passout_year = $pyear,
      adddress = '$address',
      college = '$college',
      university = '$university',
      faculty = '$faculty',
      work = '$work'
      scmedia1=$scmedia1;
      scmedia2=$scmedia2;
    WHERE email ='$email' ";
    $result = $conn->query($query);
    die('message');
 if ($conn->query($query) === true) {
       $error_message1='Profile Updated Successfully.';
                header('location:profile.php');
                           }
   else{
                  echo "Error: " . $sql . "<br>" . $conn->error;
        }

    }

}

?>
<main id="main">
  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
      <h2>Profile</h2>
      <p>Edit and Update your Profile </p>
      
      <p style="color: red;"><?php echo $error_message1; ?></p>
    </div>
  </div><!-- End Breadcrumbs -->

  <!-- ======= Pricing Section ======= -->
  <section style="background-color: #eee;">
    <div class="container py-5" data-aos="fade-up">
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="assets/img/2.png" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3"><?= $row["firstname"] ?> <?= $row["lastname"] ?></h5>
              <p class="text-muted mb-1 small"><?= $row["role"] ?></p>
              <p class="text-muted mb-1"><?= $row["work"] ?></p>
              <p class="text-muted mb-4"><?= $row["adddress"] ?></p>
              <div class="d-flex justify-content-center mb-2">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Update Profile</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Full Name</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?= $row["firstname"] ?> <?= $row["lastname"] ?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email Address</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?= $row["email"] ?> </p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Phone</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?= $row["phone_number"] ?> </p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Batch</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?= $row["enrollment_year"] ?> </p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Address</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?= $row["adddress"] ?> </p>
                </div>
              </div>
            </div>
          </div>
          <div class="list-group-item d-flex justify-content-between align-items-center p-3">
            <h5>Contact Details</h5>
          </div>
          <div class="card mb-4 mb-lg-0">
            <div class="card-body p-0">
              <ul class="list-group list-group-flush rounded-3">
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <p class="mb-0"><?= $row["scmedia1"] ?> </p>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <p class="mb-0"><?= $row["scmedia2"] ?></p>
                </li>

              </ul>
            </div>
          </div>
          <!-- <div class="col-md-6">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                </p>
                <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                <div class="progress rounded mb-2" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
        </div> -->
        </div>
      </div>
    </div>
  </section>
  <!-- End of profile section -->

  <div class="modal fade-out" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="#" class="row g-3" method="post">
            <div class="col-md-6">
                             <label for="inputEmail4" class="form-label">Name</label>
                <input type="text" class="form-control-plaintext" id="inputEmail4" value="<?= $row["firstname"] ?> <?= $row["lastname"] ?>" readonly>
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Email</label>
              <input type="text" class="form-control-plaintext" id="inputPassword4" value="<?= $row["email"] ?>" required>
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Batch</label>
              <input type="text" class="form-control-plaintext" id="inputPassword4" value="<?= $row["enrollment_year"] ?> " readonly>
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Phone Number</label>
              <input type="text" name='phone_number' class="form-control" id="inputPassword4" placeholder="<?= $row["phone_number"] ?>">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4" class="form-label">Role</label>
              <select class="form-control col-md-6" name='role'>
                <option>Student</option>
                <option>Alumni</option>
              </select>
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label" name="passout_year">Passout Year</label>
              <input type="date" class="form-control">
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Address</label>
              <input type="text" class="form-control" name="adddress" placeholder=" Address">
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">University</label>
              <input type="text" class="form-control" name="university" placeholder=" University">
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">College</label>
              <input type="text" class="form-control" name="college" placeholder=" College">
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Faculty</label>
              <input type="text" class="form-control" name="faculty" placeholder=" Faculty">
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Work(If any)</label>
              <input type="text" class="form-control" name="work" placeholder=" Work">
            </div>
            <div class="col-md-6">
              <label for="inputAddress2" class="form-label">Profile Picture</label>
              <input type="file" class="form-control" id="inputimage" name="banner" accept="image/*">
            </div>
            <div class="col-12">
              <label for="inputAddress2" class="form-label">Social Media Contact</label>
              <input type="text" class="form-control" id="inputimage" name="scmedia1" placeholder="Add your Social Media Profile Link">
            </div>
            <div class="col-12">
              <label for="inputAddress2" class="form-label">Social Media Contact</label>
              <input type="text" class="form-control" id="inputimage" name="scmedia2" placeholder="Add your Social Media Profile Link(Any Other)">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
        </form>
      </div>
    </div>
  </div>


</main><!-- End #main -->

<?php include('head/footer.php') ?>

