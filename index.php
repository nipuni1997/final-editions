<?php include ('authentication.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One Cart Shopping</title>
    <link rel="stylesheet" href="style.css">
   
    <link href="https://fonts.googleapis.com/css2?family=Lemonada:wght@600&display=swap" rel="stylesheet">


</head>
<body>
    <center>
    <div class="leftcontainer">
        <h1>One Cart Online Shopping</h1>
        <h3>Dear Customer,</h3>
        <h4>Log into your account for quick shopping...</h4>
        <h4>We save your time... </h4>
        <h1>HAPPY SHOPPING DAY!!</h1></center>

    </div>
<div class="container">
      <div class="header">
      <center><h1>Get Your Cart Now </h1></center>
      
      </div>
      <form action="index.php" method="post">
     <?php include('errors.php')?>
     <center>
     <div class="inputform">
      <div class="fields">
     
      <input type="text" name="username" placeholder="User Name" required></div>
      <div class="fields">
     
      <input type="text" name="nic" placeholder="NIC Number" required></div>
      <div class="fields">
      
      <input type="email" name="email" placeholder="Email Address" required></div>
      <div class="fields">
     
      <input type="text" name="city" placeholder="Your City" required></div>
      <div class="fields">
     
      <input type="text" name="address" placeholder="Your Address" required></div>
      <div class="fields">
      
      <input type="text" name="postal" placeholder="Postal Code" required></div>
      <div class="fields">
      
      <input type="text" name="phonenumber" placeholder="Phone Number" required></div>
      <div class="fields">
      
      <input type="password" name="password_1" placeholder=" Type your password " required></div>
      <div class="fields">
      
      <input type="password" name="password_2" placeholder="Type your password again" required></div>
</div>
</center>
      <button type="submit" name="reg_user" class="signupbtn">Submit</button>
      <button type="button" class="cancelbtn">Cancel</button>
      <center>
      <p>Already registered?<a href="login.php"><b>Log in</b></a></p>
      <div class="or"><h4>OR</h4></div>
      <p>Visit as a guest?<a href="user/firstpage.php"><b>Visit</b></a></p></center>
      </form>
      </div>
   
    
</body>
</html>