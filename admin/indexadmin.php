<?php
session_start();
if(!isset($_SESSION['admin_data'])){
    echo "Invalid login";
    header("location:../index.php");
}
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/add.css">

    <title>Amin Panel</title>
    <link rel="stylesheet" href="css/styleadmins.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,400,500,600" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>


    <!-- <link rel="stylesheet" href="css/testheight.css"> -->
</head>
<body>

    <?php
        include("include/header.php");
        include("include/bodyleft.php");
        include("include/bodyright.php");
    ?>

</body>
</html>
