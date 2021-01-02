<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One Cart Shopping</title>
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/style2.css">
    <link href="https://fonts.googleapis.com/css2?family=Lemonada:wght@600&display=swap" rel="stylesheet">


</head> 
<body>
<?php
        include("include/userfunction.php");
        include("include/header.php");
        include("include/navbar1.php");
        
       ?>
    
    <div class="container">
      <form action="myaccount.php">

        <div class="row1">
         
            
            <label for="fname"> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="John M. Doe">
            <label for="email"> Email</label>
            <input type="text" id="email" name="email" placeholder="john@example.com">
            <label for="adr"> Address</label>
            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
            <label for="city"> City</label>
            <input type="text" id="city" name="city" placeholder="New York">
            <label for="city"> <P>Phone Number </P></label>
            <input type="text" id="phone" name="phone" placeholder="+94*********">
           
            <label for="password" >Old Password</label>
            <input type="password" id="password" name="password" placeholder="*************">
            <label for="password">New Password</label>
            <input type="password" id="password" name="password" placeholder="*************">
            <label for="password">Confirm Password</label>
            <input type="password" id="password" name="password" placeholder="*************">





</div>
<button type="submit" name="update_user" class="signupbtn" id="pro_btn">Update</button>
      <button type="button" class="cancelbtn" id="pro_btn">Cancel</button>
</form>
</div>


</body>
<footer><?php
include("include/footer.php");
?></footer>
</html>