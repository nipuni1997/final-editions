<?php
    function add_cat(){
        include("include/db.php");

        if(isset($_POST['add_cat'])){
            $cat_name=$_POST['cat_name'];
            $add_cat=$con->prepare("INSERT INTO main_category(cat_name) VALUES ('$cat_name')");
            if($add_cat->execute()){
                echo "<script>alert('Category Added Successfully !')</script>";
                echo "<script>window.open('indexmanager.php?viewall_cat', '_self')</script>";
            }
            else{
                echo "<script>alert('Category Not Added Successfully !')</script>";
            }
            // $add_cat->execute();
        }
    }

    function viewall_cat(){
        include("include/db.php");

        $fetch_cat=$con->prepare("SELECT * FROM main_category");
        $fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_cat->execute();

        while($row=$fetch_cat->fetch()):
            echo"<option value='".$row['cat_id']."'>".$row['cat_name']."</option>";
        endwhile;
    }

    function viewall_category(){
        include("include/db.php");

        $fetch_cat=$con->prepare("SELECT * FROM main_category ORDER BY cat_name");
        $fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_cat->execute();

        $i=1;

        while($row=$fetch_cat->fetch()):
            // echo"<option value='".$row['cat_id']."'>".$row['cat_name']."</option>";
            echo "<tr>
                    <td style='min-width:15px'>".$i++."</td>
                    <td>".$row['cat_name']."</td>
                    <td style='min-width:50px'><a href='indexmanager.php?edit_cat=".$row['cat_id']."'>Edit</a></td>
                    <td style='min-width:50px'><a href='delete_cat.php?delete_cat=".$row['cat_id']."'>Delete</a></td>
                 </tr>";
        endwhile;

    }

    function add_pro(){
        include("include/db.php");

        if(isset($_POST['add_product'])){
            $pro_name=$_POST['pro_name'];
            $cat_id=$_POST['cat_name']; 

            $pro_img1=$_FILES['pro_img1']['name'];
            $pro_img1_tmp=$_FILES['pro_img1']['tmp_name'];

            $pro_img2=$_FILES['pro_img2']['name'];
            $pro_img2_tmp=$_FILES['pro_img2']['tmp_name'];

            move_uploaded_file($pro_img1_tmp, "../images/pro_img/$pro_img1");    //saving the uploaded images from the given path
            move_uploaded_file($pro_img2_tmp, "../images/pro_img/$pro_img2");

            $pro_weight=$_POST['pro_weight'];
            $pro_description=$_POST['pro_description'];
            $pro_moredescription=$_POST['pro_moredescription'];

            $pro_price=$_POST['pro_price'];

            $pro_keyword=$_POST['pro_keyword'];

            $add_cat=$con->prepare("INSERT INTO products(pro_name, cat_id, pro_img1, pro_img2, pro_weight, pro_description, pro_moredescription, pro_price, pro_keyword, pro_added_date)
                                    VALUES('$pro_name', '$cat_id', '$pro_img1','$pro_img2', '$pro_weight', '$pro_description', '$pro_moredescription', '$pro_price', '$pro_keyword', NOW())");

            if($add_cat->execute()){
                echo "<script>alert('Product Added Successfully !')</script>";
            }
            else{
                echo "<script>alert('Product Not Added Successfully !')</script>";
            }
            // $add_cat->execute();
        }
    }

    function viewall_products(){       
        include("include/db.php");

        $fetch_pro=$con->prepare("SELECT * FROM products");
        $fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_pro->execute();

        $i=1;

        while($row=$fetch_pro->fetch()):
            echo "<tr>
                    <td style='min-width:50px'>".$i++."</td>
                    <td style='min-width:80px'><a href='indexmanager.php?edit_pro=".$row['pro_id']."'>Edit<a/></td>
                    <td style='min-width:80px'><a href='delete_cat.php?delete_pro=".$row['pro_id']."'>Delete<a/></td>
                    <td style='min-width:135px'>".$row['pro_name']."</td>
                    <td style='min-width:135px'>
                        <img src='../images/pro_img/".$row['pro_img1']."' />
                        <img src='../images/pro_img/".$row['pro_img2']."' />
                    </td>
                    <td>".$row['pro_weight']."</td>
                    <td style='min-width:135px'>".$row['pro_description']."</td>
                    <td style='min-width:185px'>".$row['pro_moredescription']."</td>
                    <td style='min-width:80px'>".$row['pro_price']."</td>
                    <td style='min-width:185px'>".$row['pro_keyword']."</td>
                    <td style='min-width:150px'>".$row['pro_added_date']."</td>

                 </tr>";
        endwhile;
    }

    function edit_cat(){
        include("include/db.php"); 

        if(isset($_GET['edit_cat'])){
            $cat_id=$_GET['edit_cat'];

            $fetch_cat_name=$con->prepare("SELECT * FROM main_category WHERE cat_id='$cat_id'");
            $fetch_cat_name->setFetchMode(PDO:: FETCH_ASSOC);
            $fetch_cat_name->execute();
            $row=$fetch_cat_name->fetch();

            echo "<form method='post'>
                        <table>
                            <tr>
                                <td>Edit Category Name:</td>
                                <td><Input type='text' name='edit_cat_name' value='".$row['cat_name']."' required placeholder='Category Name' /></td>
                            </tr>
                        </table>
                        <center><button name='edit_cat'>Edit Category</button></center>
                    </form>";

                    if(isset($_POST['edit_cat'])){
                        $edit_cat_name=$_POST['edit_cat_name'];

                        $edit_cat=$con->prepare("UPDATE stock SET cat_name='$edit_cat_name' WHERE cat_id='$cat_id'");

                        if($edit_cat->execute()){
                            echo "<script>alert('Category Updated Successfully !')</script>";
                            echo "<script>window.open('indexmanager.php?viewall_cat', '_self')</script>";
                        }


                    }
        }
    }

    function edit_pro(){     
        include("include/db.php");

        if(isset($_GET['edit_pro'])){
            $pro_id=$_GET['edit_pro'];

            $fetch_pro=$con->prepare("SELECT * FROM products WHERE pro_id='$pro_id'");
            $fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
            $fetch_pro->execute();
            $row=$fetch_pro->fetch();

            $cat_id=$row['cat_id'];

            $fetch_cat=$con->prepare("SELECT * FROM main_category WHERE cat_id='$cat_id'");
            $fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
            $fetch_cat->execute();
            $row_cat=$fetch_cat->fetch();
            //$cat_name=$row_cat['cat_name'];

            echo "<form method='post' enctype='multipart/form-data'>
                <table>
                    <tr>
                        <td>Edit Product Name:</td>
                        <td><Input type='text' name='pro_name' value='".$row['pro_name']."' placeholder='Product Name' required /></td>
                    </tr>
                    <tr>
                        <td>Select Category Name:</td>
                        <td>
                            <select name='cat_name'>

                                "; echo viewall_cat(); echo"
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>Update Product Image 1:</td>
                        <td>
                            <Input type='file' name='pro_img1'required />
                            <img src='../images/pro_img/".$row['pro_img1']."' style='width:60px; height:60px' />
                        </td>
                    </tr>
                    <tr>
                        <td>Update Product Image 2:</td>
                        <td>
                            <Input type='file' name='pro_img2'required />
                            <img src='../images/pro_img/".$row['pro_img2']."' style='width:60px; height:60px' />
                        </td>
                    </tr>
                    <!-- <tr>
                        <td>Select Product Image 3:</td>
                        <td><Input type='file' name='pro_img3' required/></td>
                    </tr>
                    <tr>
                        <td>Select Product Image 4:</td>
                        <td><Input type='file' name='pro_img4'required /></td>
                    </tr> -->

                    <tr>
                        <td>Edit Weight:</td>
                        <td><Input type='text' name='pro_weight' value='".$row['pro_weight']."' placeholder='Weight' required /></td>
                    </tr>
                    <tr>
                        <td>Edit Description:</td>
                        <td><Input type='text' name='pro_description' value='".$row['pro_description']."' placeholder='Description' required /></td>
                    </tr>
                    <tr>
                        <td>Edit More Description:</td>
                        <td><Input type='text' name='pro_moredescription' value='".$row['pro_moredescription']."' placeholder='More' required /></td>
                    </tr>

                    <tr>
                        <td>Update Price:</td>
                        <td><Input type='text' name='pro_price' value='".$row['pro_price']."' placeholder='Price' required /></td>
                    </tr>
                    <!-- <tr>
                        <td>Enter Product ID:</td>
                        <td><Input type='text' name='pro_key' placeholder='Product Id' required /></td>
                    </tr> -->
                    <tr>
                        <td>Edit Keyword:</td>
                        <td><Input type='text' name='pro_keyword' value='".$row['pro_keyword']."' placeholder='Keyword' required /></td>
                    </tr>

                </table>
                <center><button name='edit_product'>Edit Product</button></center>
            </form>";
            //<option value='".$row['cat_id']."'></option> line 291 under select category name

            if(isset($_POST['edit_product'])){
                $pro_name=$_POST['pro_name'];
                $cat_id=$_POST['cat_name'];//v 18

                $pro_img1=$_FILES['pro_img1']['name'];
                $pro_img1_tmp=$_FILES['pro_img1']['tmp_name'];

                $pro_img2=$_FILES['pro_img2']['name'];
                $pro_img2_tmp=$_FILES['pro_img2']['tmp_name'];

                move_uploaded_file($pro_img1_tmp, "../images/pro_img/$pro_img1");
                move_uploaded_file($pro_img2_tmp, "../images/pro_img/$pro_img2");

                $pro_weight=$_POST['pro_weight'];
                $pro_description=$_POST['pro_description'];
                $pro_moredescription=$_POST['pro_moredescription'];

                $pro_price=$_POST['pro_price'];

                $pro_keyword=$_POST['pro_keyword'];

                $edit_pro=$con->prepare("UPDATE products SET pro_name='$pro_name', cat_id='$cat_id',
                                        pro_img1='$pro_img1', pro_img2='$pro_img2', pro_weight='$pro_weight', pro_description='$pro_description', pro_moredescription='$pro_moredescription',
                                        pro_price='$pro_price', pro_keyword='$pro_keyword' WHERE pro_id='$pro_id'");

                if($edit_pro->execute()){
                    echo "<script>alert('Product Updated Successfully !')</script>";
                    echo "<script>window.open('indexmanager.php?viewall_products', '_self')</script>";
                }
            }
        }
    }

    function delete_cat(){  
        include("include/db.php");

        $delete_cat_id=$_GET['delete_cat'];

        $delete_cat=$con->prepare("DELETE FROM stock WHERE cat_id='$delete_cat_id'");

        if($delete_cat->execute()){
            echo "<script>alert('Category Deleted Successfully !')</script>";
            echo "<script>window.open('indexmanager.php?viewall_cat', '_self')</script>";
        }

    }

    function delete_product(){
        include("include/db.php");

        $delete_product_id=$_GET['delete_pro'];
        $delete_pro=$con->prepare("DELETE FROM products WHERE pro_id='$delete_product_id'");

        if($delete_pro->execute()){
            echo "<script>alert('Product Deleted Successfully !')</script>";
            echo "<script>window.open('indexmanager.php?viewall_products', '_self')</script>";
        }
    }

    function add_deliver(){
        include("include/db.php");

        if(isset($_POST['add_deliver'])){
            $d_name=$_POST['d_name'];
            // $cat_id=$_POST['cat_name'];
            $d_nic=$_POST['d_nic'];

            $d_img=$_FILES['d_img']['name'];
            $d_img_tmp=$_FILES['d_img']['tmp_name'];

            move_uploaded_file($d_img_tmp, "../images/deliver/$d_img");    //saving the uploaded images from the given path

            $d_email=$_POST['d_email'];
            $d_add=$_POST['d_add'];
            $d_phone=$_POST['d_phone'];
            $d_pass_1=$_POST['d_pass_1'];
            $d_pass_2=$_POST['d_pass_2'];
            if($d_pass_1 != $d_pass_2)
            {
                echo "<script>alert('your both passwords are not same !')</script>"; 
            }
            else
            {
                $d_pass=md5($d_pass_1);

            $add_deli=$con->prepare("INSERT INTO deliver(d_name, d_nic, d_img, d_email, d_add, d_phone,d_pass, d_date)
                                    VALUES('$d_name', '$d_nic', '$d_img', '$d_email', '$d_add', '$d_phone','$d_pass', NOW())");

            if($add_deli->execute()){
                echo "<script>alert('Deliver Details Added Successfully !')</script>";
            }
            else{
                echo "<script>alert('Deliver Details Not Added Successfully !')</script>";
            }
            }

            
        }
    }

    function view_deliver(){
        include("include/db.php");

        $fetch_pro=$con->prepare("SELECT * FROM deliver");
        $fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_pro->execute();

        $i=1;

        while($row=$fetch_pro->fetch()):
            echo "<tr>
                    <td style='min-width:50px'>".$i++."</td>
                    <td style='min-width:60px'><a href='indexmanager.php?edit_deliver=".$row['d_id']."'>Edit<a/></td>
                    <td style='min-width:60px'><a href='delete_cat.php?delete_deliver=".$row['d_id']."'>Delete<a/></td>
                    <td style='min-width:135px'>".$row['d_name']."</td>
                    <td>".$row['d_nic']."</td>
                    <td style='min-width:135px'>
                        <img src='../images/deliver/".$row['d_img']."' />
                    </td>
                    <td>".$row['d_email']."</td>
                    <td>".$row['d_add']."</td>
                    <td>".$row['d_phone']."</td>
                    <td style='min-width:150px'>".$row['d_date']."</td>

                 </tr>";
        endwhile;
    }

    function edit_deliver(){
        include("include/db.php");

        if(isset($_GET['edit_deliver'])){
            $d_id=$_GET['edit_deliver'];

            $fetch_pro=$con->prepare("SELECT * FROM deliver WHERE d_id='$d_id'");
            $fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
            $fetch_pro->execute();
            $row=$fetch_pro->fetch();

            echo "<form method='post' enctype='multipart/form-data'>
                <table>
                    <tr>
                        <td>Edit Name:</td>
                        <td><Input type='text' name='d_name' value='".$row['d_name']."' placeholder='Name' required/></td>
                    </tr>
                    <tr>
                        <td>Edit NIC:</td>
                        <td><Input type='text' name='d_nic' value='".$row['d_nic']."' placeholder='NIC' required /></td>
                    </tr>
                    <tr>
                        <td>Update Person Image:</td>
                        <td>
                            <Input type='file' name='d_img' required/>
                            <img src='../images/deliver/".$row['d_img']."' style='width:60px; height:60px' />
                        </td>
                    </tr>
                    <tr>
                        <td>Edit Email:</td>
                        <td><Input type='email' name='d_email' value='".$row['d_email']."' placeholder='Email' required/></td>
                    </tr>
                    <tr>
                        <td>Edit Address:</td>
                        <td><Input type='text' name='d_add' value='".$row['d_add']."' placeholder='Address' required/></td>
                    </tr>
                    <tr>
                        <td>Edit Contact No:</td>
                        <td><Input type='tel' name='d_phone' value='".$row['d_phone']."'  placeholder='123-456-7890' pattern='[0-9]{3}-[0-9]{3}-[0-9]{4}' size='12' maxlength='12' required/></td>
                    </tr>

                </table>
                <center><button name='edit_deliver'>Edit Deliver</button></center>
            </form>";

            if(isset($_POST['edit_deliver'])){
                $d_name=$_POST['d_name'];

                $d_nic=$_POST['d_nic'];

                $d_img=$_FILES['d_img']['name'];
                $d_img_tmp=$_FILES['d_img']['tmp_name'];
                move_uploaded_file($d_img_tmp, "../images/deliver/$d_img");

                $d_email=$_POST['d_email'];
                $d_add=$_POST['d_add'];
                $d_phone=$_POST['d_phone'];

                $edit_deli=$con->prepare("UPDATE deliver SET d_name='$d_name', d_nic='$d_nic', d_img='$d_img',  d_email='$d_email', d_add='$d_add',
                                                 d_phone='$d_phone' WHERE d_id='$d_id'");

                if($edit_deli->execute()){
                    echo "<script>alert('Delivery Person Updated Successfully !')</script>";
                    echo "<script>window.open('indexmanager.php?view_deliver', '_self')</script>";
                }
            }
        }
    }

    function delete_deliver(){
        include("include/db.php");

        $delete_product_id=$_GET['delete_deliver'];
        $delete_pro=$con->prepare("DELETE FROM deliver WHERE d_id='$delete_product_id'");

        if($delete_pro->execute()){
            echo "<script>alert('Deliver Person Removed Successfully !')</script>";
            echo "<script>window.open('indexmanager.php?view_deliver', '_self')</script>";
        }
    }

    function view_deliverstatus(){       //check it deliver Status
        include("include/db.php");

        $fetch_pro=$con->prepare("SELECT * FROM deliverstatus");
        $fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_pro->execute();

        $i=1;

        while($row=$fetch_pro->fetch()):
            echo "<tr>
                    <td style='min-width:50px'>".$i++."</td>
                    <td style='min-width:60px'>".$row['cart_id']."</td>
                    <td style='min-width:60px'>".$row['user_id']."</td>
                    <td style='min-width:135px'>".$row['user_name']."</td>
                    <td>".$row['condi']."</td>
                    <td style='min-width:135px'>
                        <img src='../images/condition/".$row['img']."' />
                    </td>
                    <td>".$row['status']."</td>
                    <td style='min-width:150px'>".$row['deli_date']."</td>

                 </tr>";
        endwhile;
    }

    function view_order(){
        include("include/db.php");

        $fetch_cart=$con->prepare("SELECT * FROM cart");
        $fetch_cart->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_cart->execute();
        // $row_cart=$fetch_cart->fetch();
        // $id1=$row_cart['pro_id'];
        // $id2=$row_cart['userid'];
        $row_check=$fetch_cart->rowCount();

        $fetch_user=$con->prepare("SELECT u_id, u_name FROM user"); // WHERE u_id='$id2'
        $fetch_user->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_user->execute();
        $row_user=$fetch_user->fetch();


        if($row_check > 0){

            $i=1;

            while($row_cart=$fetch_cart->fetch()):
                $id1=$row_cart['pro_id'];

                $fetch_pro=$con->prepare("SELECT pro_id, pro_name, pro_img1, pro_weight, pro_price FROM products WHERE pro_id='$id1'");
                $fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
                $fetch_pro->execute();
                $row_pro=$fetch_pro->fetch();

                $sub_total=$row_pro['pro_price'] * $row_cart['qnty'];

                echo "<tr>
                        <td style='min-width:100px'>".$i++."</td>
                        <td style='min-width:100px'>".$row_user['u_id']."</td>
                        <td style='min-width:130px'>".$row_user['u_name']."</td>
                        <td style='min-width:100px'>".$row_cart['cart_id']."</td>
                        <td style='min-width:100px'>".$row_pro['pro_id']."</td>
                        <td style='min-width:150px'>".$row_cart['addDate']."</td>
                        <td style='min-width:150px'>".$row_pro['pro_name']."</td>
                        <td style='min-width:135px'>
                            <img src='../images/pro_img/".$row_pro['pro_img1']."' />
                        </td>
                        <td>".$row_pro['pro_weight']."</td>
                        <td>".$row_pro['pro_price']."/=</td>
                        <td>".$row_cart['qnty']."</td>
                        <td>".$row_cart['urgent']."</td>
                        <td>".$sub_total."/=</td>

                    </tr>";

            endwhile;
        }
        else{
          echo "<center><h2>Nothing To Display.</br>
                            No One Order Foods From Your Shop....!!!</h2></center>";
        }
    }

    function vieworderCount(){
        include("include/db.php");

        $fetch_cart=$con->prepare("SELECT * FROM cart");
        $fetch_cart->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_cart->execute();
        $row_cart=$fetch_cart->fetch();
        $row_check=$fetch_cart->rowCount();

        echo "$row_check";
    }

    function managerCount(){
        include("include/db.php");

        $fetch_cart=$con->prepare("SELECT * FROM manager");
        $fetch_cart->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_cart->execute();
        $row_cart=$fetch_cart->fetch();
        $row_check=$fetch_cart->rowCount();

        echo "$row_check";
    }

    function categoryCount(){
        include("include/db.php");

        $fetch_cart=$con->prepare("SELECT * FROM main_category");
        $fetch_cart->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_cart->execute();
        $row_cart=$fetch_cart->fetch();
        $row_check=$fetch_cart->rowCount();

        echo "$row_check";
    }     

    function view_user(){
        include("include/db.php");

        $fetch_pro=$con->prepare("SELECT * FROM user");
        $fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_pro->execute();

        $i=1;

        while($row=$fetch_pro->fetch()):
            echo "<tr>
                    <td style='min-width:50px'>".$i++."</td>
                    <td style='min-width:135px'>".$row['u_name']."</td>
                   
                    <td>".$row['u_email']."</td>
                    <td>".$row['u_city']."</td>
                    <td>".$row['u_add']."</td>
                    <td>".$row['u_phone']."</td>
                    <td style='min-width:150px'>".$row['u_reg_date']."</td>

                 </tr>";
        endwhile;
    }
    
    // function no_order(){
    //   include("include/db.php");
    //
    //   $fetch_cart=$con->prepare("SELECT * FROM cart");
    //   $fetch_cart->setFetchMode(PDO:: FETCH_ASSOC);
    //   $fetch_cart->execute();
    //   $row_cart=$fetch_cart->fetch();
    //
    //   $row_check=$fetch_cart->rowCount();
    //
    //   if($row_check==0){
    //     echo "string";
    //   }
    // }

    function add_manager(){
        include("include/db.php");

        if(isset($_POST['add_manager'])){
            $m_name=$_POST['m_name'];
            // $cat_id=$_POST['cat_name'];
            $m_nic=$_POST['m_nic'];

            $m_img=$_FILES['m_img']['name'];
            $m_img_tmp=$_FILES['m_img']['tmp_name'];

            move_uploaded_file($m_img_tmp, "../images/manager/$m_img");    //saving the uploaded images from the given path

            $m_email=$_POST['m_email'];
            $m_add=$_POST['m_add'];
            $m_phone=$_POST['m_phone'];
            $m_pass_1=$_POST['m_pass_1'];
            $m_pass_2=$_POST['m_pass_2'];
            if($m_pass_1 != $m_pass_2)
            {
                echo "<script>alert('your both passwords are not same !')</script>";
            }
            else
            {
                $m_pass=md5($m_pass_1);

                $add_mana=$con->prepare("INSERT INTO manager(m_name, m_nic, m_img, m_email, m_add, m_phone,m_pass, m_date)
                                        VALUES('$m_name', '$m_nic', '$m_img', '$m_email', '$m_add', '$m_phone','$m_pass', NOW())");
    
                if($add_mana->execute()){
                    echo "<script>alert('Manager Details Added Successfully !')</script>";
                }
                else{
                    echo "<script>alert('Manager Details Not Added Successfully !')</script>";
                }
            }

           
        }
    }

    function view_manager(){
        include("include/db.php");

        $fetch_pro=$con->prepare("SELECT * FROM manager");
        $fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_pro->execute();

        $i=1;

        while($row=$fetch_pro->fetch()):
            echo "<tr>
                    <td style='min-width:50px'>".$i++."</td>
                    <td style='min-width:60px'><a href='indexmanager.php?edit_manager=".$row['m_id']."'>Edit<a/></td>
                    <td style='min-width:60px'><a href='delete_cat.php?delete_manager=".$row['m_id']."'>Delete<a/></td>
                    <td style='min-width:135px'>".$row['m_name']."</td>
                    <td>".$row['m_nic']."</td>
                    <td style='min-width:135px'>
                        <img src='../images/manager/".$row['m_img']."' />
                    </td>
                    <td>".$row['m_email']."</td>
                    <td>".$row['m_add']."</td>
                    <td>".$row['m_phone']."</td>
                    <td style='min-width:150px'>".$row['m_date']."</td>

                 </tr>";
        endwhile;
    }

    function edit_manager(){
        include("include/db.php");

        if(isset($_GET['edit_manager'])){
            $m_id=$_GET['edit_manager'];

            $fetch_pro=$con->prepare("SELECT * FROM manager WHERE m_id='$m_id'");
            $fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
            $fetch_pro->execute();
            $row=$fetch_pro->fetch();

            echo "<form method='post' enctype='multipart/form-data'>
                <table>
                    <tr>
                        <td>Edit Name:</td>
                        <td><Input type='text' name='m_name' value='".$row['m_name']."' placeholder='Name' required /></td>
                    </tr>
                    <tr>
                        <td>Edit NIC:</td>
                        <td><Input type='text' name='m_nic' value='".$row['m_nic']."' placeholder='NIC' required/></td>
                    </tr>
                    <tr>
                        <td>Update Person Image:</td>
                        <td>
                            <Input type='file' name='m_img' required/>
                            <img src='../images/manager/".$row['m_img']."' style='width:60px; height:60px' />
                        </td>
                    </tr>
                    <tr>
                        <td>Edit Email:</td>
                        <td><Input type='email' name='m_email' value='".$row['m_email']."' placeholder='Email' required/></td>
                    </tr>
                    <tr>
                        <td>Edit Address:</td>
                        <td><Input type='text' name='m_add' value='".$row['m_add']."' placeholder='Address' required /></td>
                    </tr>
                    <tr>
                        <td>Edit Contact No:</td>
                        <td><Input type='tel' name='m_phone' value='".$row['m_phone']."' placeholder='123-456-7890' pattern='[0-9]{3}-[0-9]{3}-[0-9]{4}' size='12' maxlength='12' required /></td>
                    </tr>

                </table>
                <center><button name='edit_manager'>Edit Manager</button></center>
            </form>";

            if(isset($_POST['edit_manager'])){
                $m_name=$_POST['m_name'];

                $m_nic=$_POST['m_nic'];

                $m_img=$_FILES['m_img']['name'];
                $m_img_tmp=$_FILES['m_img']['tmp_name'];
                move_uploaded_file($m_img_tmp, "../images/manager/$m_img");

                $m_email=$_POST['m_email'];
                $m_add=$_POST['m_add'];
                $m_phone=$_POST['m_phone'];

                $edit_mana=$con->prepare("UPDATE manager SET m_name='$m_name', m_nic='$m_nic', m_img='$m_img',  m_email='$m_email', m_add='$m_add',
                                                 m_phone='$m_phone' WHERE m_id='$m_id'");

                if($edit_mana->execute()){
                    echo "<script>alert('Manager Updated Successfully !')</script>";
                    echo "<script>window.open('indexmanager.php?view_manager', '_self')</script>";
                }
            }
        }
    }

    function delete_manager(){
        include("include/db.php");

        $delete_manager_id=$_GET['delete_manager'];
        $delete_mana=$con->prepare("DELETE FROM manager WHERE m_id='$delete_manager_id'");

        if($delete_mana->execute()){
            echo "<script>alert('Manager Removed Successfully !')</script>";
            echo "<script>window.open('indexmanager.php?view_manager', '_self')</script>";
        }
    }
?>
