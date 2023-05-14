<?php include 'header.php'; ?>
<?php
    $db = new Database();

    if(isset($_POST['addProduct'])){
        $title = $_POST['title'];
        $salePrice = $_POST['sale_price'];
        $categoryId = $_POST['category_id'];
        $status = $_POST['status'];


        $thumbExt = pathinfo($_FILES['thumbnail_image']['name'], PATHINFO_EXTENSION);
        $filename = time().'.'.$thumbExt;
        $destination = './../uploads/product/'.$filename;
        move_uploaded_file($_FILES['thumbnail_image']['tmp_name'], $destination);
        if($salePrice!=0){
        $insert = $db->insert("INSERT INTO products(title, sale_price, category_id, status,thumbnail_image) VALUES('$title', '$salePrice', '$categoryId', '$status','$filename')");
        }else{
            echo '<script language="javascript">';
            echo 'alert("Price must be greater then zero")';
            echo '</script>'; 
            echo '<script>window.location.replace("addproduct.php");</script>';
        }

        if($insert){
            echo '<script language="javascript">';
            echo 'alert("Product Added successfully ")';
            echo '</script>';
        }else{
            echo $conn->error;
        }
        $insert_id = $db->getLastId();

        //thumbnail_image 
        $thumbExt = pathinfo($_FILES['thumbnail_image']['name'], PATHINFO_EXTENSION);
        $filename = time().'.'.$thumbExt;
        $destination = './../uploads/product/'.$filename;
        move_uploaded_file($_FILES['thumbnail_image']['tmp_name'], $destination);
        $db->insert("INSERT INTO product_images(product_id, image) VALUES('$insert_id', '$filename')");

      
       
    }

    if(isset($_POST['updateProduct'])){
           
        $pid = $_POST['pid'];

        $title = $_POST['title'];
        
        $salePrice = $_POST['sale_price'];
        $categoryId = $_POST['category_id'];
        $status = $_POST['status'];
        $pimg=$_FILES['thumbnail_image']['name'];
        $oldimage = $_POST['old_image'];

if($pimg !=null){
    $updatefile = $_FILES['thumbnail_image']['name'];
    $thumbExt = pathinfo($updatefile, PATHINFO_EXTENSION);
    $updatefile = time().'.'.$thumbExt;
        $destination = './../uploads/product/'.$updatefile;
        move_uploaded_file($updatefile, $destination);
        if(($salePrice!=0)&&($status!=0)){
        $insert = $db->update("Update products SET title = '$title',  sale_price = '$salePrice',  category_id = '$categoryId', status = '$status', thumbnail_image='$updatefile' WHERE id = '$pid'");
     
        }else{
            echo '<script language="javascript">';
            echo 'alert("This Field must be greater then zero")';
            echo '</script>'; 
            echo '<script>window.location.replace("editproduct.php?product_id='.$pid.'");</script>';
        }

     
        if($insert){
            echo '<script language="javascript">';
            echo 'alert("Product Updated successfully ")';
            echo '</script>';
        }else{
            echo $conn->error;
        }

    }else{


        if(($salePrice!=0)&&($status!=0)){
        $insert = $db->update("Update products SET title = '$title',  sale_price = '$salePrice',  category_id = '$categoryId', status = '$status' WHERE id = '$pid'");
    }else{
        echo '<script language="javascript">';
        echo 'alert("This Field must be greater then zero")';
        echo '</script>'; 
        echo '<script>window.location.replace("editproduct.php?product_id='.$pid.'");</script>';
    }

        
        
        if($insert){
            echo '<script language="javascript">';
            echo 'alert("Product Updated successfully ")';
            echo '</script>';
        }else{
            echo $conn->error;
        }
    }

        $thumbExt = pathinfo($_FILES['thumbnail_image']['name'], PATHINFO_EXTENSION);
        $filename = time().'.'.$thumbExt;
        $destination = './../uploads/product/'.$filename;
        move_uploaded_file($_FILES['thumbnail_image']['tmp_name'], $destination);


     
       
    }

    if(isset($_POST['deleteProduct'])){
        $pid = $_POST['pid'];
        $delete = $db->delete("DELETE FROM products WHERE id = '$pid' ");
        if($delete){

            echo '<script language="javascript">';
            echo 'alert("Product Deleted successfully ")';
            echo '</script>';
        }else{
            echo $conn->error;
        }
    }

    $result = $db->select("SELECT * FROM products ORDER BY id DESC");

?>

<h1 style="margin-top:20px; padding-top:50px; text-align: center; border:none; color:gray;">ALL Products</h1>

    <div class="header_fixed">
        <table class="tbl">

            <thead>
            <button id="btnlft"><a style="color:white;"  href="./addproduct.php">Add Product</a></button>
                <tr>
                        <th style="text-align: center;">Product Id </th>
                        <th style="text-align:center;">Product </th>
                        <th style="text-align: center;">Price</th>
                        <th style="text-align: center;">Category </th>
                        <th style="text-align: center;">Stock</th>
                        <th style="text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td> <?php echo $row['id']; ?></td>
                    <td> <img  src=" ../uploads/product/<?php echo $row['thumbnail_image']; ?>" >  <p> <?php echo $row['title']; ?></p></td>
                    <td><?php echo $row['sale_price']; ?></td>
                    <?php if(isset( $row['category_id'])){
                             
                             $catid=$row['category_id'];
                             
                             
                         $run_data= $db->select("SELECT * FROM categories WHERE cid = '$catid'");
                             while($row1 = mysqli_fetch_array($run_data)){
                                        $catname=$row1['name'];
     
                             }
                             ?>
                               
                             <td style="text-align: center;"><?php echo $catname; ?></td>
                             <?php }?>             
                    
                    <td><?php echo $row['status']; ?></td>
                    <td><button id="edtbtn"> <a style="color: white;" href="editproduct.php?product_id=<?php echo $row['id']; ?>"><i class="fa fa-pencil"></i></a> </button>
                            <form action="products.php" method="post">
                            
                        <input type="hidden" name="pid" value="<?php echo $row['id']; ?>">
                        <button id="delbtn" style="color: white;" type="submit"  name="deleteProduct" value="Delete "> <i class="fa fa-trash"></i></button>
                   </form></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>