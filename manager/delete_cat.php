<?php
    include("include/managerfunction.php");

    if(isset($_GET['delete_cat'])){
        echo delete_cat();
    }

    if(isset($_GET['delete_pro'])){  
        echo delete_product();
    }

    if(isset($_GET['delete_deliver'])){
        echo delete_deliver();
    }
?>
