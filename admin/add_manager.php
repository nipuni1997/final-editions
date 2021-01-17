<div id="bodyright">
    <h2>Add New Manager From Here</h2>
    <form method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Enter Name Of The Manager:</td>
                <td><Input type="text" name="m_name" placeholder="Name" required/></td>
            </tr>
            <tr>
                <td>Enter NIC No:</td>
                <td><Input type="text" name="m_nic" placeholder="*********V" maxlength="12" size="12" required/></td>
            </tr>
            <tr>
                <td>Add Image:</td>
                <td><Input type="file" name="m_img" required/></td>
            </tr>
            <tr>
                <td>Enter Email:</td>
                <td><Input type="email" name="m_email" placeholder="Email" required/></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><textarea type="text" name="m_add" id="" cols="" rows="3" placeholder="Address Here ...." required></textarea></td>
            </tr>
            <tr>
                <td>Contact No:</td>
                <td><Input type="tel" name="m_phone" placeholder='+94*******' size='12' maxlength='12' required/></td>
                <!-- pattern='[0-9]{3}-[0-9]{3}-[0-9]{4}' -->
            </tr>

            <tr>
                <td>Password:</td>
                <td><Input type="password" id='password' name="m_pass_1" placeholder="*********" required/></td>
            </tr>
            <tr>
                <td>Confirm password:</td>
                <td><Input type="password" id='confirm_password' name="m_pass_2" placeholder="*********" required/></td>
            </tr>

        </table>
        <center><button name="add_manager">Add Manager</button></center>
    </form>
</div>


<?php
    include("include/adminfunction.php");
    echo add_manager();
?>
