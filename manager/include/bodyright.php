<?php
      if(!isset($_GET['home'])){
      if(!isset($_GET['viewall_cat'])){
      if(!isset($_GET['add_product'])){
      if(!isset($_GET['viewall_products'])){

        if(!isset($_GET['view_normal'])){
        if(!isset($_GET['view_urgent'])){
          if(!isset($_GET['view_Urgentorder_VIEW'])){
          if(!isset($_GET['view_Normalorder_VIEW'])){

      if(!isset($_GET['view_order'])){

      if(!isset($_GET['view_user'])){
      if(!isset($_GET['add_deliver'])){
      if(!isset($_GET['view_deliver'])){
      if(!isset($_GET['view_deliverstatus'])){
      if(!isset($_GET['returned'])){
?>

    <?php
        if(isset($_GET['edit_cat'])){
            include("edit_cat.php");
        }
        if(isset($_GET['edit_pro'])){
            include("edit_pro.php");
        }
        if(isset($_GET['edit_manager'])){
            include("edit_manager.php");
        }
        if(isset($_GET['edit_deliver'])){
            include("edit_deliver.php");
        }
     ?>

<?php

} } } } } } } } } } } } }

} } } } } } } } } }


?>
