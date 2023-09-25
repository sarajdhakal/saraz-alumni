<?php 
include ('../config/db.php');
if (isset($_POST['delete_testimonials'])){
 $testimonials_id = $_POST['testimonials_id'];
 $sql = "DELETE FROM testimonials WHERE testimonials_id='$testimonials_id'";   
 $result = $conn->query($sql);
 header('location:testimonials.php');
}


if (isset($_POST['delete_user'])){
    $user_id = $_POST['user_id'];
    $sql = "DELETE FROM users WHERE user_id='$user_id'";   
    $result = $conn->query($sql);
    header('location:users.php');
   }

   if (isset($_POST['delete_admin'])){
    $admin_id = $_POST['admin_id'];
    $sql = "DELETE FROM admin WHERE admin_id='$admin_id'";   
    $result = $conn->query($sql);
    header('location:admin.php');
   }

   if (isset($_POST['delete_job'])){
    $job_id = $_POST['job_id'];
    $sql = "DELETE FROM jobs WHERE job_id='$job_id'";   
    $result = $conn->query($sql);
    header('location:jobs.php');
   }

   if (isset($_POST['delete_event'])){
    $event_id = $_POST['event_id'];
    $sql = "DELETE FROM events WHERE event_id='$event_id'";   
    $result = $conn->query($sql);
    header('location:events.php');
   }
   if (isset($_POST['delete_alumni'])){
    $alumni_id = $_POST['alumni_id'];
    $sql = "DELETE FROM alumni WHERE alumni_id='$alumni_id'";   
    $result = $conn->query($sql);
    header('location:alumni.php');
   }
   if (isset($_POST['delete_student'])){
    $student_id = $_POST['student_id'];
    $sql = "DELETE FROM student WHERE student_id='$student_id'";   
    $result = $conn->query($sql);
    header('location:students.php');}
?>