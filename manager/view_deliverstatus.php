<div class="scroll" id="bodyright"> <!---11--->
    <h2>Update Delivery Information From Here</h2>
    <form method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <th>No.</th>
                <th>Cart ID</th>
                <th>User ID</th>
                <th>User Name</th>
                <th>Condition</th>
                <th>Image</th>
                <th>Status</th>
                <th>Deliver Date</th>
            </tr>

            <?php include("include/managerfunction.php"); echo view_deliverstatus();?>

        </table>
    </form>
</div>
