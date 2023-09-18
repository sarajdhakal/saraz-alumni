<?php 
include ('../config/db.php');
if (isset($_POST['delete'])){
 $testimonials_id = $_POST['testimonials_id'];
 $sql = "DELETE FROM testimonials WHERE testimonials_id='$testimonials_id'";   
 $result = $conn->query($sql);
 header('location:testimonials.php');
}
?>