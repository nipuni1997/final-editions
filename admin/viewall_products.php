<div class="scroll" id="bodyright"> <!---11--->
    <h2>Update Product From Here</h2>
    <form method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <th>No.</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>Product Name</th>
                <th>Product Images</th>
                <th>Net Weight</th>
                <th>Description</th>
                <th>More Description</th>
                <th>Price (RS)</th>
                <th>Keyword</th>
                <th>Added Date</th>
            </tr>

            <?php include("include/adminfunction.php"); echo viewall_products();?>

        </table>
    </form>
</div>
