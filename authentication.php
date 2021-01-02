<?php
session_start();
$username="";

$email="";
$nic="";
$postal="";
$city="";
$address="";
$phonenumber="";

$errors = array();

$db=mysqli_connect("localhost","root","","onecart") or die("not connected");
// register user
if(isset($_POST['reg_user'])){
$username = mysqli_real_escape_string($db,$_POST['username']);

$email = mysqli_real_escape_string($db,$_POST['email']);
$postal =mysqli_real_escape_string($db,$_POST['postal']);
$address =mysqli_real_escape_string($db,$_POST['address']);
$city =mysqli_real_escape_string($db,$_POST['city']);
$phonenumber =mysqli_real_escape_string($db,$_POST['phonenumber']);
$password_1 = mysqli_real_escape_string($db,$_POST['password_1']);
$password_2 = mysqli_real_escape_string($db,$_POST['password_2']);

//form validation
if(empty($username)){
    array_push($errors,"User name is required.");
}
if(empty($email)){array_push($errors,"Email is required.");}
if(empty($password_1)){array_push($errors,"Password is required.");}
if($password_1 != $password_2){array_push($errors, "Passwords do not match");}


// check db for existing user with same username
$user_check_query = "SELECT * FROM user WHERE  u_email = '$email' ";

$results = mysqli_query($db,$user_check_query);
$user = mysqli_fetch_assoc($results);

if($user){
   
    array_push($errors,"Email is already exist.");
}
//register the user no error
if(count($errors) == 0){
    $password = md5($password_1);
    $query = "INSERT INTO user (u_name, u_email , u_pass,u_city,u_add,u_code,u_phone,u_reg_date) VALUES ('$username', '$email','$password','$city','$address','$postal','$phonenumber',Now())";
    mysqli_query($db,$query);
    $_SESSION['email'] = $email;
    $_SESSION['success'] ="You are now logged in";

    header('location: user/indexuser.php');
}
}

//login

if(isset($_POST['login_user'])){
    $email = mysqli_real_escape_string($db,$_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password_1']);
    if(empty($email)){
        array_push($errors,"Email is required");
    }
    if(empty($password)){
        array_push($errors,"Password is required");
       
    }

   
    if(count($errors)==0){
        $password =md5($password);
       
        
        $query_1 ="SELECT * FROM user WHERE u_email='$email' AND u_pass='$password'";
        $query_2="SELECT * FROM manager WHERE m_email='$email' AND m_pass='$password'";
        $query_3="SELECT * FROM deliver WHERE d_email='$email' AND d_pass='$password'";
        $query_4="SELECT * FROM admin WHERE a_email='$email' AND a_password='$password'";
        $results_1=mysqli_query($db,$query_1);
        $results_2=mysqli_query($db,$query_2);
        $results_3=mysqli_query($db,$query_3);
        $results_4=mysqli_query($db,$query_4);

        if(mysqli_num_rows($results_1)){
            $data=mysqli_fetch_assoc($results_1);
            $_SESSION['user_data']=$data;
            $_SESSION['email']=$email;
            $_SESSION['success']="Login is successful.";
            header("location:user/indexuser.php");
        }else if(mysqli_num_rows($results_2)){ 
            $data=mysqli_fetch_assoc($results_2);
            $_SESSION['manager_data']=$data;
            $_SESSION['email']=$email;
            $_SESSION['success']="Login is successful.";
            header("location:manager/indexmanager.php?home");
        
        }else if(mysqli_num_rows($results_3)){
            $data=mysqli_fetch_assoc($results_3);
            $_SESSION['delivery_data']=$data;
            $_SESSION['email']=$email;
            $_SESSION['success']="Login is successful.";
            header("location:deliver/indexdeliver.php?home");
        }else if(mysqli_num_rows($results_4)){
            $data=mysqli_fetch_assoc($results_4);
            $_SESSION['admin_data']=$data;
            $_SESSION['email']=$email;
            $_SESSION['success']="Login is successful.";
            header("location:admin/indexadmin.php?home");
        }else{
    array_push($errors,"wrong login.");
}
    }

}

?>
 