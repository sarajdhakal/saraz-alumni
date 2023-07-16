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
                                    <img src="assets/img/2.png" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                    <div class="button-wrapper">
                                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                            <span class="d-none d-sm-block">Upload new photo</span>
                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                            <input type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" />
                                        </label>
                                        <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                            <i class="bx bx-reset d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Reset</span>
                                        </button>
                                        <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-0" />
                            <div class="card-body">
                                <form id="formAccountSettings" method="POST" action="edit-profile.php">
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
                                                <span class="input-group-text">NEP (+977)</span>
                                                <input type="text" name='phone_number' class="form-control" id="inputPassword4" placeholder="<?= $row["phone_number"] ?>">
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="language" class="form-label">Role</label>
                                            <select id="language" class="select2 form-select">
                                                <option value="Student">Student</option>
                                                <option value="Alumni">Alumni</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="inputPassword4" class="form-label" name="passout_year">Passout Year</label>
                                            <input type="date" class="form-control">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="inputPassword4" class="form-label">Address</label>
                                            <input type="text" class="form-control" name="adddress" placeholder=" Address">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="inputPassword4" class="form-label">University</label>
                                            <input type="text" class="form-control" name="university" placeholder=" University">
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label for="inputPassword4" class="form-label">College</label>
                                            <input type="text" class="form-control" name="college" placeholder=" College">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="inputPassword4" class="form-label">Faculty</label>
                                            <input type="text" class="form-control" name="faculty" placeholder=" Faculty">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="inputPassword4" class="form-label">Work(If any)</label>
                                            <input type="text" class="form-control" name="work" placeholder=" Work">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputAddress2" class="form-label">Social Media Contact</label>
                                            <input type="text" class="form-control" id="inputimage" name="scmedia1" placeholder="Add your Social Media Profile Link">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputAddress2" class="form-label">Social Media Contact</label>
                                            <input type="text" class="form-control" id="inputimage" name="scmedia2" placeholder="Add your Social Media Profile Link(Any Other)">
                                        </div>
                                        <div class="mt-2">
                                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                            <button type="reset" class="btn btn-outline-secondary">Cancel</button>
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