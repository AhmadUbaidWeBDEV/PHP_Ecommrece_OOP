<?php include './header.php'; ?>
<?php 
    $db = new Database();
    if(isset($_POST['addCategory'])){
        $name = $_POST['name'];
        $insert = $db->insert("INSERT INTO categories(name) VALUES('$name') ");
        if($insert){
            echo '<script language="javascript">';
            echo 'alert("Category Added successfully ")';
            echo '</script>';
        }else{
            echo $conn->error;
        }
    }
    if(isset($_POST['updateCategory'])){
        $name = $_POST['name'];
        $cid = $_POST['cid'];
        $update = $db->update("UPDATE categories SET name = '$name' WHERE cid = '$cid' ");
        if($update){
            echo '<script language="javascript">';
            echo 'alert("Category Updated successfully ")';
            echo '</script>';
        }else{
            echo $conn->error;
        }
    }
    if(isset($_POST['deleteCategory'])){
        $cid = $_POST['cid'];
        $delete = $db->delete("DELETE FROM categories WHERE cid = '$cid' ");
        if($delete){
            echo '<script language="javascript">';
            echo 'alert("Category Deleted successfully ")';
            echo '</script>';
        }else{
            echo $conn->error;
        }
    }

    $categories = $db->select("SELECT * FROM `categories` ORDER BY `categories`.`cid` DESC");
?>

    <h1 style="margin-top:20px; padding-top:50px; text-align: center; border:none; color:gray;">ALL Categories</h1>

                <div class="header_fixed">
                                   
        <table class="tbl">
       
        <thead>
        <button id="btnlft"><a style="color:white;"  href="./add-category.php">Add Category</a></button>
                    <tr>
                        <th style="text-align: center;">Category Id</th>
                        <th style="text-align: center;">Category Name</th>
                        <th style="text-align: start;">Action</th>
                    </tr>
                </thead>
            <tbody>
            <?php while($row = $categories->fetch_assoc()): ?>
                    
                    <tr>
                        <td style="text-align: center;"> <?php echo $row['cid']; ?></td>

                        <td style="text-align: center;"><?php echo $row['name']; ?></td>

                    <td>
                    <button id="edtbtn"> <a style="color: white;" href="editcategory.php?category=<?php echo $row['cid']; ?>"><i class="fa fa-pencil"></i></a> </button>
                            <form action="categories.php" method="post">
                            
                        <input type="hidden" name="cid" value="<?php echo $row['cid']; ?>">
                        <button id="delbtn" style="color: white;" type="submit"  name="deleteCategory" value="Delete "><i class="fa fa-trash"></i></button>
                   </form></td>
                </tr>
             <?php endwhile; ?>
            </tbody>
        </table>
    </div>