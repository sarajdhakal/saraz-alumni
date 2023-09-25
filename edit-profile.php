<?php
session_start();
$error_pyear = $error_message = $error_message1 = '';
if (!isset($_SESSION['is_login']) || $_SESSION == false) {
    header('Location:login.php');
}

include 'head/header.php';
include 'config/db.php';
$flag=0;
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
    $role = validate_form($_POST['role']);
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
    if (($row["role"]) == 'Student') {
        if ($role == 'Alumni' && $pyear == '') {
            $error_message1 = 'Alumni must enter passout year.';
        } else if ($role == 'Alumni' && $pyear != '') {
            if (($pyear - $row["enrollment_year"]) < 4) {
                $error_message1 = 'Invalid passout year.';
            }
        } else if ($role == 'Student' && $pyear > 0) {
            $error_message1 = 'Student cannot have passout year.';
        } else {
            $sql = "UPDATE users SET
        role = '$role', 
        passout_year = '$pyear', 
        adddress = '$address',
         college = '$college', 
         university = '$university', 
         faculty = '$faculty',
         work = '$work', 
         user_image= '$user_image',
         scmedia1 = '$scmedia1',
          scmedia2 = '$scmedia2' 
        WHERE email ='$email' ";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                move_uploaded_file($_FILES['user_image']['tmp_name'], "upload_images/$user_image");
                $flag=2;
                $error_message1 = 'Successfully updated.';
                // header('Location:edit-profile.php');
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    } else {
        if (($row["role"]) == 'Alumni') {
            $sql = "UPDATE users SET 
        adddress = '$address',
         college = '$college', 
         university = '$university', 
         faculty = '$faculty',
         work = '$work', 
         user_image= '$user_image',
         scmedia1 = '$scmedia1',
          scmedia2 = '$scmedia2' 
        WHERE email ='$email' ";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                move_uploaded_file($_FILES['user_image']['tmp_name'], "upload_images/$user_image");
                $error_message1 = 'Successfully updated.';
                $flag=2;
                // header('Location:edit-profile.php');
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
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
        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Pricing Section ======= -->
    <section style="background-color: #eee;">
    <?php
    if ($flag == 2) {
    ?>
    <div class="form-control">
        <div class="alert alert-success " role="alert">
            <?php echo $error_message1; ?>
        </div>
    <?php
    } else if ($flag == 1) {
    ?>
        <div class="alert alert-danger p-1 text-danger" role="alert">
            <?php echo $error_message1; ?>
        </div>
    </div>
    <?php
    }
    ?>
        <div class="container py-5" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="upload_images/<?= $row["user_image"] ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3"><?= $row["firstname"] ?> <?= $row["lastname"] ?></h5>
                            <p class="text-muted mb-1 small"><?= $row["role"] ?></p>
                            <p class="text-muted mb-1"><?= $row["work"] ?></p>
                            <p class="text-muted mb-4"><?= $row["adddress"] ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-header">Profile Details</h5>
                            <!-- Account -->
                            <div class="card-body">
                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                    <img src="upload_images/<?= $row["user_image"] ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                    <form method="POST" action="edit-profile.php" enctype="multipart/form-data">
                                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                                            <div class="form-group students-up-files">
                                                <label>Upload New Image</label>
                                                <div class="upload">
                                                    <input class="form-control" type="file" id="formFile" name="user_image" accept="image/png, image/jpeg">
                                                </div>
                                            </div>
                                        </div>

                                </div>
                                <!-- <div class="button-wrapper">
                                       
                                            <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                <span class="d-none d-sm-block">Upload new photo</span>
                                                <i class="bx bx-upload d-block d-sm-none"></i>
                                                <input type="file" id="upload" name="user_image" class="account-file-input" hidden accept="image/png, image/jpeg" />
                                            </label>
                                            <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                    </div> -->
                            </div>
                        </div>
                        <hr class="my-0" />
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input type="text" class="form-control-plaintext" id="inputEmail4" value="<?= $row["firstname"] ?> " readonly>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control-plaintext" id="inputEmail4" value="<?= $row["lastname"] ?> " readonly>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input type="text" class="form-control-plaintext" id="inputPassword4" value="<?= $row["email"] ?>" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="inputPassword4" class="form-label">Batch</label>
                                    <input type="text" class="form-control-plaintext" id="inputPassword4" value="<?= $row["enrollment_year"] ?> " readonly>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="phoneNumber">Phone Number</label>
                                    <div class="input-group input-group-merge">
                                        <!-- <span class="input-group-text">NEP (+977)</span> -->
                                        <input type="text" name='phone_number' class="form-control-plaintext" id="inputPassword4" value="NEP (+977) <?= $row["phone_number"] ?>" readonly>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="role" class="form-label">Role</label>
                                    <?php
                                    if ($row["role"] === 'Alumni') {
                                    ?> <div class="input-group input-group-merge">
                                            <input type="text" name='role' class="form-control-plaintext" id="role" value=" <?= $row["role"] ?>" readonly>
                                        </div>
                                    <?php } else {
                                    ?>
                                        <select id="role" name="role" class="select2 form-select">
                                            <option value="Student">Student</option>
                                            <option value="Alumni">Alumni</option>
                                        </select> <?php } ?>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="Passout_year" class="form-label" name="passout_year">Passout Year</label>
                                    <?php
                                    if ($row["role"] === 'Alumni') {
                                    ?> <div class="input-group input-group-merge">
                                            <input type="text" name='passout_year' class="form-control-plaintext" id="passout_year" value=" <?= $row["passout_year"] ?>" readonly>
                                        </div>
                                    <?php } else {
                                    ?>
                                        <input type="number" name="passout_year" class="form-control" placeholder="YYYY" min="1999" max="2023">
                                        <script>
                                            document.querySelector("input[type=number]")
                                                .oninput = e => console.log(new Date(e.target.valueAsNumber, 0, 1))
                                        </script><?php } ?>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="inputPassword4" class="form-label">Address</label>
                                    <input type="text" class="form-control" name="adddress" placeholder=" Address" value="<?= $row["adddress"] ?>">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="inputPassword4" class="form-label">University</label>
                                    <input type="text" class="form-control" name="university" placeholder=" University" value="<?= $row["university"] ?>">
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="inputPassword4" class="form-label">College</label>
                                    <input type="text" class="form-control" name="college" placeholder=" College" value="<?= $row["college"] ?>">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="inputPassword4" class="form-label">Faculty</label>
                                    <input type="text" class="form-control" name="faculty" placeholder=" Faculty" value="<?= $row["faculty"] ?>">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="inputPassword4" class="form-label">Work(If any)</label>
                                    <input type="text" class="form-control" name="work" placeholder=" Work" value="<?= $row["work"] ?>">
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="inputAddress2" class="form-label">Social Media Contact</label>
                                    <input type="text" class="form-control" id="inputimage" name="scmedia1" placeholder="Add your Social Media Profile Link" value="<?= $row["scmedia1"] ?>">
                                </div>
                                <div class="mb-3 col-12">
                                    <label for="inputAddress2" class="form-label">Social Media Contact</label>
                                    <input type="text" class="form-control" id="inputimage" name="scmedia2" placeholder="Add your Social Media Profile Link(Any Other)" value="<?= $row["scmedia2"] ?>">
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                    <button type="reset" class="btn btn-outline-secondary"><a href="profile.php"> Cancel</button></a>
                                </div>
                                </form>
                            </div>
                            <!-- /Account -->
                        </div>
                    </div>
                </div>
            </div>


</main>




<?php include('head/footer.php'); ?>