<div class="scroll" id="bodyright">
    <h2>Update Manager From Here</h2>
    <form method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <th>No.</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>Name</th>
                <th>NIC</th>
                <th>Image</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Added Date</th>
            </tr>

            <?php include("include/managerfunction.php"); echo view_manager();?>

        </table>
    </form>
</div>
