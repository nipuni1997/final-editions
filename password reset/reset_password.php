<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles.css">
    <title>Onecart Reset Password</title>
  </head>
  <body>
  <center>
    <div class="leftcontainer">
       <img src="images/white.png" alt="">
        <h1>One Cart Online Shopping</h1>
        <h2>Dear Customer,</h2>
        <h3>Log into your account for quick shopping...</h3>
        <h3>We save your time... </h3>
        <h1>HAPPY SHOPPING DAY!!</h1></center>

    </div>
    <div class="container1">
    <div class="header">
    <center><h2>Reset Password</h2></center>
    </div>
    <center>
          <form action="reset_password.php" method="POST">              
              <p>
                Dear User, Kindly fill up your new Password<br>
                We will help you to login your account ASAP.
              </p>
              <div class="fields">
              <input type="password" name="new_pass1" placeholder="New Password" required>
              </div>
              
              <div class="fields">
              <input type="password" name="new_pass2" placeholder="Confirm New Password" required>
            </div>   
            <button type="submit" class="btn solid" name="reset">Reset</button>
          </form>     
      </center>
    </div>
</body>
</html>

<?php
session_start();
$errors = array();
$db=mysqli_connect("localhost","root","","onecart") or die("not connected");

if(isset($_POST['reset'])){
$pass_1 = mysqli_real_escape_string($db,$_POST['new_pass1']);
$pass_2 = mysqli_real_escape_string($db,$_POST['new_pass2']);

if($pass_1 != $pass_2){array_push($errors, "Passwords do not match");}
if(count($errors)==0){
    $pass_1 =md5($pass_1);
    $Email = $_SESSION['email'];
    if($Email)
    {
      mysqli_query($db,"UPDATE  user SET u_pass = '$pass_1' WHERE u_email = '$Email'");
      ?>
      <script>
      window.location.replace("login.php");
      alert("<?php echo "your password has been succesful reset"?>");
      </script>
      <?php
    }
    else{
      ?>
      <script>
      window.location.replace("login.php");
      alert("<?php echo "Please try again"?>");
      </script>
      <?php

    }
    
}
}

?>
