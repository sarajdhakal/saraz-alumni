<?php include 'head/header.php';
include 'config/db.php';
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

?>

<main id="main">

<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs" data-aos="fade-in">
  <div class="container">
    <h2>Alumni Details</h2>
    <p>The alumni management system streamlines communication and facilitates meaningful interactions to strengthen the bond between the institution and its graduates. </p>
  </div>
</div><!-- End Breadcrumbs -->

<section style="background-color: #eee;">
  <div class="container py-5" data-aos="fade-up">
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="upload_images/<?=$row['alumni_image']?>" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3"><?=$row['first_name']?> <?=$row['middle_name']?> <?=$row['last_name']?></h5>
            <p class="text-muted mb-1 small">Alumni</p>
            <p class="text-muted mb-1"><?=$row['post']?></p>
            <p class="text-muted mb-4"><?=$row['address']?></p>
                  </div>
        </div>
        <!-- <div class="list-group-item d-flex justify-content-between align-items-center p-3">
        <h5>Contact Details</h5>
        </div>
        <div class="card mb-4 mb-lg-0">
          <div class="card-body p-0">
                  <ul class="list-group list-group-flush rounded-3">
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <p class="mb-0">https://mdbootstrap.com</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <p class="mb-0">mdbootstrap</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <p class="mb-0">@mdbootstrap</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <p class="mb-0">mdbootstrap</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <p class="mb-0">mdbootstrap</p>
              </li>
            </ul>
          </div>
        </div> -->
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?=$row['first_name']?> <?=$row['middle_name']?> <?=$row['last_name']?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?=$row['alumni_email']?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Batch</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?=$row['batch']?></p>
              </div>
            </div>

            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">University</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?=$row['university']?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">College</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?=$row['college']?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Faculty</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?=$row['faculty']?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?=$row['address']?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <p class="mb-4"><span class="text-primary font-italic me-1">Alumni Contribution</span>
                </p>
                <p class="mb-1" style="font-size: 1rem;"><?=$row['project1_name']?></p>
               
                <p class="mt-4 mb-1" style="font-size: .9rem;"><?=$row['project1_description']?></p>                
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <p class="mb-4"><span class="text-primary font-italic me-1">Alumni Contribution</span>
                </p>
                <p class="mb-1" style="font-size: 1rem;"><?=$row['project2_name']?></p>
               
                <p class="mt-4 mb-1" style="font-size: .9rem;"><?=$row['project2_description']?></p>                
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
</main>

<?php include 'head/footer.php' ?>
