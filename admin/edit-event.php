<?php
include('head/header.php');
$error_message1 = '';
function validate_form($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if (!isset($_GET['event_id']) || empty($_GET['event_id'])) {
    header('Location: events.php');
    exit;
}
$event_id = validate_form($_GET['event_id']);
$flag = 0;
$error_message1= "Error in updating.";
$sql = "SELECT * FROM events where event_id ='$event_id' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
if (isset($_POST['add_event'])) {
    $event_title = validate_form($_POST['event_title']);
    $organizer = validate_form($_POST['organizer']);
    $organizer_email = validate_form($_POST['organizer_email']);
    $type = validate_form($_POST['type']);
    $venue = validate_form($_POST['venue']);
    $date_and_time = validate_form($_POST['date_and_time']);
    $description = validate_form($_POST['description']);
    $join_event = validate_form($_POST['join_event']);
    $banner_image = $_FILES['banner_image']['name'];
    if ($banner_image === '') {
        $banner_image = $row["banner_image"];
    }
    if ($date_and_time === '') {
        $date_and_time = $row["date_and_time"];
    }

    if ($flag == 0) {
        move_uploaded_file($_FILES['banner_image']['tmp_name'], "../upload_images/$banner_image");
        $sql1 = "UPDATE  events Set event_title='$event_title', organizer='$organizer', organizer_email='$organizer_email', type='$type', venue='$venue',
            date_and_time= $date_and_time,
         banner_image='$banner_image', description='$description' , join_event= '$join_event'
        where event_id='$event_id' ";
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
                    <h3 class="page-title">Edit/View Event</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="events.php">Events</a></li>
                        <li class="breadcrumb-item active">Edit/View Event</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="edit-event.php?event_id=<?=$row['event_id']?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title"><span>Event Information</span></h5>
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
                                <img src="../upload_images/<?= $row["banner_image"] ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                <div class="col-12 col-sm-4">
                                
                                    <div class="form-group students-up-files">
                                    <div class="form-group students-up-files">
                                    <label>Upload student Images</label>
                                    <div class="upload">
                                        <input class="form-control" type="file" id="formFile" name="banner_image" accept="image/png, image/jpeg">
                                    </div>
                                </div>
                                    </div>
                                
                                </div>
                                <p class="font-weight-normal " style=" color:red;"></p>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Event Title <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control" id="inputEmail4" name="event_title" placeholder="Title of Event" value="<?= $row['event_title'] ?>" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Organizer Name <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control" id="inputPassword4" name="organizer" placeholder="Organizer" value="<?= $row['organizer'] ?>" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Organizer Email <span class="login-danger">*</span></label>
                                        <input type="email" class="form-control" id="inputPassword4" name="organizer_email" placeholder="Students or Alumni Email" value="<?= $row['organizer_email'] ?>" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Type <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control" id="inputPassword4" name="type" placeholder="Eg: Cultural Event" value="<?= $row['type'] ?>" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Venue <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control" id="inputEmail4" name="venue" placeholder="Venue" value="<?= $row['venue'] ?>" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Date <span class="login-danger">*</span></label>
                                        <input type="date" class="form-control" id="inputPassword4" name="date_and_time" value="<?= $row['date_and_time'] ?>" required>
                                    </div>
                                </div>


                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Description <span class="login-danger">*</span></label>
                                        <textarea class="form-control" rows="4" cols="50" name="description" placeholder="Description of Event" " required><?= $row['description'] ?></textarea>
                                    </div>
                                </div>
                                <div class=" col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Join Event <span class="login-danger">*</span></label>
                                        <textarea class="form-control" rows="4" cols="50" name="join_event" placeholder="How to join Event?"  required><?= $row['join_event'] ?></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="student-submit">
                                        <button type="submit" name="add_event" class="btn btn-primary"> <i class="bi bi-send"></i> Submit</button>
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