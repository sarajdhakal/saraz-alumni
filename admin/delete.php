<?php 
session_start();
include ('../config/db.php');
if (isset($_POST['delete_testimonials'])){
 $testimonials_id = $_POST['testimonials_id'];
 $sql = "DELETE FROM testimonials WHERE testimonials_id='$testimonials_id'";   
 $result = $conn->query($sql);
 if ($result) {
    $_SESSION['testimonial_deleted'] = true;
} else {
    $_SESSION['testimonial_deleted'] = false; 
}
 header('location:testimonials.php');
 exit;
}


if (isset($_POST['delete_user'])){
    $user_id = $_POST['user_id'];
    $sql = "DELETE FROM users WHERE user_id='$user_id'";   
    $result = $conn->query($sql);
    if ($result) {
        $_SESSION['user_deleted'] = true;
    } else {
        $_SESSION['user_deleted'] = false; 
    }
    header('Location: users.php');
    exit; 
} 

   if (isset($_POST['delete_admin'])){
    $admin_id = $_POST['admin_id'];
    $sql = "DELETE FROM admin WHERE admin_id='$admin_id'";   
    $result = $conn->query($sql);
    if ($result) {
        $_SESSION['admin_deleted'] = true;
    } else {
        $_SESSION['admin_deleted'] = false; 
    }
    header('location:admin.php');
    exit;
   }

   if (isset($_POST['delete_job'])){
    $job_id = $_POST['job_id'];
    $sql = "DELETE FROM jobs WHERE job_id='$job_id'";   
    $result = $conn->query($sql);
    if ($result) {
        $_SESSION['job_deleted'] = true;
    } else {
        $_SESSION['job_deleted'] = false; 
    }
    header('location:jobs.php');
    exit;
   }

   if (isset($_POST['delete_event'])){
    $event_id = $_POST['event_id'];
    $sql = "DELETE FROM events WHERE event_id='$event_id'";   
    $result = $conn->query($sql);
    if ($result) {
        $_SESSION['event_deleted'] = true;
    } else {
        $_SESSION['event_deleted'] = false; 
    }
    header('location:events.php');
    exit;
   }
   if (isset($_POST['delete_alumni'])){
    $alumni_id = $_POST['alumni_id'];
    $sql = "DELETE FROM alumni WHERE alumni_id='$alumni_id'";   
    $result = $conn->query($sql);
    if ($result) {
        $_SESSION['alumni_deleted'] = true;
    } else {
        $_SESSION['alumni_deleted'] = false; 
    }
    header('location:alumni.php');
    exit;
   }
   if (isset($_POST['delete_student'])){
    $student_id = $_POST['student_id'];
    $sql = "DELETE FROM student WHERE student_id='$student_id'";   
    $result = $conn->query($sql);
    if ($result) {
        $_SESSION['student_deleted'] = true;
    } else {
        $_SESSION['student_deleted'] = false; 
    }
    header('location:students.php');
    exit;
}
?>