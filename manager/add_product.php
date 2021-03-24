<div id="bodyright">
    <h2>Add New Product From Here</h2>
    <form method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Enter Product Name:</td>
                <td><Input type="text" name="pro_name" placeholder="Product Name" required/></td>
            </tr>
            <tr>
                <td>Select Category Name:</td>
                <td><select name="cat_name" required><?php include("include/managerfunction.php"); echo viewall_cat(); ?></select></td>
            </tr>
            <tr>
                <td>Select Product Image 1:</td>
                <td><Input type="file" name="pro_img1" required/></td>
            </tr>
            <tr>
                <td>Select Product Image 2:</td>
                <td><Input type="file" name="pro_img2" required/></td>
            </tr>
            <!-- <tr>
                <td>Select Product Image 3:</td>
                <td><Input type="file" name="pro_img3" /></td>
            </tr>
            <tr>
                <td>Select Product Image 4:</td>
                <td><Input type="file" name="pro_img4" /></td>
            </tr> -->

            <tr>
                <td>Enter Net Weight:</td>
                <td><Input type="text" name="pro_weight" placeholder="Net weight" required/></td>
            </tr>
            <tr>
                <td>Enter Description :</td>
                <td><Input type="text" name="pro_description" placeholder="Description" required/></td>
            </tr>
            <tr>
                <td>Enter More Description :</td>
                <td><Input type="text" name="pro_moredescription" placeholder="More"/></td>
            </tr>

            <tr>
                <td>Enter Price (RS):</td>
                <td><Input type="text" name="pro_price" placeholder="Price" required /></td>
            </tr>
            <!-- <tr>
                <td>Enter Product ID:</td>
                <td><Input type="text" name="pro_key" /></td>
            </tr> -->
            <tr>
                <td>Enter Keyword:</td>
                <td><Input type="text" name="pro_keyword" placeholder="Keyword" required/></td>
            </tr>

        </table>
        <center><button name="add_product">Add Product</button></center>
    </form>
</div>

<?php
    echo add_pro();
?>
