<div id="bodyright">
    <h2>View All Categories</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <th>No.</th>
                <th>Category Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

            <?php include("include/managerfunction.php"); echo viewall_category(); ?>

        </table>
    </form>

    <h2 id="add_cat">Add New Category From Here</h2>
    <form method="post">
        <table>
            <tr>
                <td>Enter Category Name:</td>
                <td><Input type="text" name="cat_name" placeholder="New Category" required /></td>
            </tr>
        </table>
        <center><button name="add_cat">Add Category</button></center>
    </form>
</div>

<?php
    
    echo add_cat();

?>
