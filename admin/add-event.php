<?php
include('head/header.php');
$error_message1 = 'Error';
$flag = 0;
function validate_form($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_POST) {
    $event_title = validate_form($_POST['event_title']);
    $organizer = validate_form($_POST['organizer']);
    $organizer_email = validate_form($_POST['organizer_email']);
    $type = validate_form($_POST['type']);
    $venue= validate_form($_POST['venue']);
    $date_and_time = validate_form($_POST['date_and_time']);
    $description = validate_form($_POST['description']);
    $join_event = validate_form($_POST['join_event']);
    $banner_image = $_FILES['banner_image']['name'];
    move_uploaded_file($_FILES['banner_image']['tmp_name'], "../upload_images/$banner_image");
    if ($banner_image === '') {
        $banner_image = $row["banner_image"];
    }
    if ($flag == 0) {
        $sql = "INSERT INTO events (event_title, organizer,organizer_email,type,venue,date_and_time, description,join_event,banner_image) 
         VALUES ('$event_title','$organizer','$organizer_email','$type','$venue','$date_and_time','$description','$join_event','$banner_image')";
        if ($conn->query($sql) === true) {
            $flag = 2;
            $error_message1 = 'Event added successfully.';
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
                    <h3 class="page-title">Add Event</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="events.php">Events</a></li>
                        <li class="breadcrumb-item active">Add Event</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="add-event.php" method="post" enctype="multipart/form-data">
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
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Event Title <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control" id="inputEmail4" name="event_title" placeholder="Title of Event" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Organizer Name <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control" id="inputPassword4" name="organizer" placeholder="Organizer" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Organizer Email <span class="login-danger">*</span></label>
                                        <input type="email" class="form-control" id="inputPassword4" name="organizer_email" placeholder="Students or Alumni Email" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Type <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control" id="inputPassword4" name="type" placeholder="Eg: Cultural Event" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Venue <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control" id="inputEmail4" name="venue" placeholder="Venue" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Date and Time <span class="login-danger">*</span></label>
                                        <input type="date" class="form-control" id="inputPassword4" name="date_and_time" required>
                                    </div>
                                </div>


                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Description <span class="login-danger">*</span></label>
                                        <textarea class="form-control" rows="4" cols="50" name="description" placeholder="Description of Event" required></textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Join Event <span class="login-danger">*</span></label>
                                        <textarea class="form-control" rows="4" cols="50" name="join_event" placeholder="How to join Event?" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group students-up-files">
                                    <label>Upload Jobs Images</label>
                                    <div class="upload">
                                        <input class="form-control" type="file" id="formFile" name="banner_image" accept="image/png, image/jpeg">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="student-submit">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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