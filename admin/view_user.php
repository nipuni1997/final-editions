<div class="scroll" id="bodyright">
    <h3>View all Users</h3>
    <form method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>NIC</th>
                <th>Email</th>
                <th>City</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Added Date</th>
            </tr>

            <?php include("include/adminfunction.php"); echo view_user();?>

        </table>
    </form>
</div>
