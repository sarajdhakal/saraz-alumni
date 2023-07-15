
<?php 
include ('head/header.php');
if(isset($_SESSION['is_login']) && $_SESSION == true){
  header('Location:index.php');
}
$error_fname= $error_lname= $error_email= $error_pass= $error_rpass=$error_eyear=$error_pyear=$error_message=$error_message1='';

function validate_form($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  if($_POST){
    $fname= validate_form($_POST['firstname']);
    $lname= validate_form($_POST['lastname']);
    $email = validate_form($_POST['email']);
    $phone = validate_form($_POST['phone_number']);
    $pass= validate_form($_POST['password']);
    $rpass= validate_form($_POST['rpassword']);
    $role= validate_form($_POST['role']);
    $gender= validate_form($_POST['gender']);
    $eyear=validate_form($_POST['enrollment_year']);
    $pyear=validate_form($_POST['passout_year']);

    include 'config/db.php'; 
    $sql = "SELECT * FROM users WHERE email='$email' ";
    $result = $conn->query($sql);
    $flag=0;
    if ($result->num_rows > 0) {
      // output data of each row
            $error_message="User already existed.";
    } else {
        if (strlen($fname) < 3 ){
            $error_fname="First name > 2 letters.";
              $flag=1;
                 }
        else if(strlen($lname)< 3){
                    $error_fname="Last name > 2 letters.";
                    $flag =1;
                }
        else if ($pass!= $rpass){
                 $error_rpass="Password not matched";
                 $flag =1;
                  }
         else if(($role ='Student') and $pyear >= 1999 ){
           $error_pyear="Students can't have passout year";
        }
      //   else if(($role ='Alumni') and ($pyear - $eyear <= 3 )){
      //     $error_eyear="Invalid Enrollment Year or Passout Year";
      //  }
        $pass = password_hash($pass,PASSWORD_DEFAULT);  
        if ($flag == 0){
        $sql = "INSERT INTO users (firstname, lastname, email, phone_number,password,role,gender,enrollment_year,passout_year) 
                   VALUES ('$fname', '$lname', '$email', '$phone','$pass','$role','$gender','$eyear','$pyear')";
                if ($conn->query($sql) === true) {
                  $error_message1='Successfully registered.';
                        header('location:login.php');
                                        }
                else{
                               echo "Error: " . $sql . "<br>" . $conn->error;
                     }
                    }
    }
  }
?>

<head>


<link href="assets/css/loginpage.css" rel="stylesheet">
</head>
<main>
<div class="wrapper">
<!----------------------------- Form box ----------------------------------->    
    <div class="form-box">
      <!------------------- registration form -------------------------->
      <div class="register-container" id="register">
          <div class="welcome"> Welcome to Alumni Management System</div>
            <div class="top">
                <span>Have an account? <a href="login.php"><u>Sign In</a></u></span>
                <header style="padding: 0px;">Sign Up</header>
                <span style="color: red;"><?php echo $error_message1; ?></span>
                <span style="color: red;"><?php echo $error_message; ?></span>
            </div>
            <form action="register.php" method="post">
            <div class="two-forms">
                <div class="input-box">
                    <input type="text" name="firstname" class="input-field" placeholder="Firstname" required>
                    <i class="bx bx-user"></i>
                    <span style="color: red;"><?php 
                    echo $error_fname; ?></span>
                        </div>
                <div class="input-box">
                    <input type="text" name="lastname" class="input-field" placeholder="Lastname" required>
                    <i class="bx bx-user"></i>
                    <span style="color: red;"><?php echo $error_lname; ?></span>
                </div>
            </div>
            <div class="two-forms">
              <div class="input-box">
                <input type="email" name="email" class="input-field" placeholder="Email" required>
                <i class="bx bx-envelope"></i>
              </div>
              <div class="input-box">
                  <input type="text" name="phone_number" class="input-field" placeholder="Phone Number" required>
                  <i class="bx bx-phone"></i>
              </div>
          </div>
           <div class="two-forms">
              <div class="input-box">
                <input type="password" name="password" class="input-field" placeholder="Password" required>
                <i class="bx bx-lock-alt"></i>
              </div>
              <div class="input-box">
                  <input type="password" name="rpassword" class="input-field" placeholder="Repeat Password" required>
                  <i class="bx bx-lock-alt"></i>
                  <span style="color: red;"><?php echo $error_rpass; ?></span>
              </div>
          </div>
          <div class="two-forms">
            <div class="input-box">
            <label style="color:white;">Choose Role :</label>
              <select name="role" id="role" class="input-field">
                <option value="Student" class="input-fields">Student</option>
                <option value="Alumni" class="input-fields">Alumni</option>
            </select>
              <i class="bx bx-group"></i>
            </div>
            <div class="input-box">
            <label style="color:white;">Gender :</label>
               <select name="gender" id="role" class="input-field">
                <option value="Male" class="input-fields">Male</option>
                <option value="Female" class="input-fields">Female</option>
                <option value="Others" class="input-fields">Others</option>
                    </select>
                <i class="bi bi-gender-ambiguous"></i>
            </div>
                   </div>
        <div class="two-forms">
              <div class="input-box">
                <label style="color:white;">Enrollment Year</label><input type="number" name="enrollment_year" class ="input-field" placeholder="YYYY" min="1999" max="2023" required>
                  <script>
      document.querySelector("input[type=number]")
      .oninput = e => console.log(new Date(e.target.valueAsNumber, 0, 1))
   </script>
                <i class="bx bx-calendar"></i>
                <span style="color: red;"><?php echo $error_eyear; ?></span>
              </div>
              <div class="input-box">
                 <label style="color:white;">Passout Year</label><input type="number" name="passout_year" class ="input-field"  placeholder="YYYY" min="1999" max="2023" >
   <script>
      document.querySelector("input[type=number]")
      .oninput = e => console.log(new Date(e.target.valueAsNumber, 0, 1))
   </script>
                  <i class="bx bx-calendar"></i>
                               </div>
          </div>
            <div class="input-box">
                <button type="Submit" class="submit">Sign Up</button>
            </div>
            </form>
                    </div>

    </div>
</div>
</main>
