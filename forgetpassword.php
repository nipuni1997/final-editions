<?php
session_start();

// include_once 'database.php';

$servername='localhost';
$username='root';
$password='';
$dbname = "onecart-test";
$conn=mysqli_connect($servername,$username,$password,"$dbname");

if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
}



if(isset($_POST['submit']))
{
    $u_nic = $_POST['u_nic'];
    $result = mysqli_query($conn,"SELECT * FROM user where u_nic='" . $_POST['u_nic'] . "'");
    $row = mysqli_fetch_assoc($result);
	$fetch_user_id=$row['u_nic'];
	$u_email=$row['u_email'];
	$u_pass=$row['u_pass'];
	if($u_nic==$fetch_user_id) {
        
				$to = $u_email;
                $subject = "Password";
                $txt = "Your password is : $u_pass.";
                $headers = "From: password@OneCartShopping.com" . "\r\n" .
                "CC: somebodyelse@example.com";
                // ini_set();
                mail($to,$subject,$txt,$headers);
			}
				else{
					echo 'invalid userid';
				}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<style type="text/css">
 input{
 border:1px solid olive;
 border-radius:5px;
 }
 h1{
  color:darkgreen;
  font-size:22px;
  text-align:center;
 }

</style>
</head>
<body>
<h1>Forgot Password<h1>
<form action='' method='post'>
<table cellspacing='5' align='center'>
<tr><td>user NIC:</td><td><input type='text' name='u_nic'/></td></tr>
<tr><td></td><td><input type='submit' name='submit' value='Submit'/></td></tr>
</table>
</form>
</body>
</html>