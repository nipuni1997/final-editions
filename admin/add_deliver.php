<div id="bodyright">
    <h3>Add New Delivery Person From Here</h3>
    <form method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Enter Name Of The Delivery Person:</td>
                <td><Input type="text" name="d_name" placeholder="Name" required/></td>
            </tr>
            <tr>
                <td>Enter NIC No:</td>
                <td><Input type="text" name="d_nic" placeholder="*********V" required/></td>
            </tr>
            <tr>
                <td>Add Image:</td>
                <td><Input type="file" name="d_img" required/></td>
            </tr>
            <tr>
                <td>Enter Email:</td>
                <td><Input type="text" name="d_email" placeholder="Email" required/></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><textarea type="text" name="d_add" id="" cols="" rows="4" placeholder="Address Here ...."required></textarea></td>
            </tr>
            <tr>
                <td>Contact No:</td>
                <td><Input type="text" name="m_phone" placeholder="+94*********" required/></td>
            </tr>

            <tr>
                <td>Password:</td>
                <td><Input type="password" name="m_pass_1" placeholder="*********" required/></td>
            </tr>
            <tr>
                <td>Cofirm password:</td>
                <td><Input type="password" name="m_pass_2" placeholder="*********" required/></td>
            </tr>


        </table>
        <center><button name="add_deliver">Add Deliver</button></center>
    </form>
</div>

<?php
    include("include/adminfunction.php");
    echo add_deliver();
?>
