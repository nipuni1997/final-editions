<div id="bodyright">
    <h2>Add Your Delivery Status From Here</h2>
    <form method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Select Cart ID:</td>
                <td><select name="cart_id"><?php include("include/deliverfunction.php"); echo viewall_cartid(); ?></select></td>
                <!-- <td><Input type="number" name="cart_id" /></td> -->
            </tr>
            <tr>
                <td>Enter User ID:</td>
                <td><select name="user_id"><?php echo viewall_id(); ?></select></td>
                <!-- <td><Input type="number" name="user_id" /></td> -->
            </tr>
            <tr>
                <td>Select User Name:</td>
                <td><select name="user_name"><?php echo viewall_name(); ?></select></td>
                <!-- <td><Input type="text" name="user_name" /></td> -->
            </tr>
            <tr>
                <td>Enter The Condition Of The Food Item:</td>
                <td><textarea type="text" name="condi" id="" cols="50" rows="4" placeholder="Any Condition?"></textarea></td>
            </tr>
            <tr>
                <td>Upload Item Image:</td>
                <td><Input type="file" name="img" /></td>
            </tr>
            <tr>
                <td>Enter Delivery Status:</td>
                <td><textarea type="text" name="status" id="" cols="50" rows="4" placeholder="No One at Home...."></textarea></td>
            </tr>

        </table>
        <center><button name="add_status">Save</button></center>
    </form>
</div>

<?php
    // include("include/deliverfunction.php");
    echo add_status();
?>
