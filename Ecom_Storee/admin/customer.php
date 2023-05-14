<?php include './header.php'; ?>
<?php 
    $db = new Database();
    

    if(isset($_POST['addcustomer'])){
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $User_Role = $_POST['User_Role'];
        $password = $_POST['password'];
        $insert = $db->insert("INSERT INTO users(name, phone, email, User_Role,password) VALUES('$name', '$phone', '$email', '$User_Role','$password')");
        if($insert){
            echo '<script language="javascript">';
            echo 'alert("User Added successfully ")';
            echo '</script>';
        }else{
            echo $conn->error;
        }
    }
    
    if(isset($_POST['editcustomer'])){
        $uid = $_POST['uid'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $User_Role = $_POST['User_Role'];
        $password = $_POST['password'];
        $update = $db->update("UPDATE users SET name = '$name',phone ='$phone',email='$email',User_Role='$User_Role',password ='$password' WHERE id = '$uid' ");
        if($update){
            echo '<script language="javascript">';
            echo 'alert("User Updated successfully ")';
            echo '</script>';
        }else{
            echo $conn->error;
        }
    }

    if(isset($_POST['deletecustomer'])){
        $uid = $_POST['uid'];
        echo $uid;
        $delete = $db->delete("DELETE FROM users WHERE id = '$uid' ");
        if($delete){
            echo '<script language="javascript">';
            echo 'alert("User Deleted successfully ")';
            echo '</script>';
        }else{
            echo $conn->error;
            
        }
    }

    $categories = $db->select("SELECT * FROM `users` ORDER BY `users`.`id` DESC");
?>
<h1 style="margin-top:20px; padding-top:50px; text-align: center; border:none; color:gray;">ALL Users</h1>

                <div class="header_fixed">
                                   
        <table class="tbl">
       
        <thead>
        <button id="btnlft"><a style="color:white;"  href="./add-costumer.php">Add User</a></button>
                    <tr>
                        <th style="text-align: center;">User Id</th>
                        <th style="text-align: center;">User Role</th>
                        <th style="text-align: center;">Name</th>
                        <th style="text-align: center;">Phone</th>
                        <th style="text-align: center;">Email</th>
                        <th style="text-align: center">Password</th>
                        <th style="text-align: center">Action</th>
                    </tr>
                </thead>
            <tbody>
            <?php while($row = $categories->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['User_Role']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['password']; ?></td>

                    <td>
                    <button id="edtbtn" > <a style="color: white;" href="edit-costumer.php?user_id=<?php echo $row['id']; ?>"><i class="fa fa-pencil"></i></a> </button>
                            <form action="customer.php" method="POST">
                               
                        <input type="text" style="display: none;" name="uid" value="<?php echo $row['id']; ?>">
                        <button id="delbtn" style="color: white;" type="submit"  name="deletecustomer" value="Delete "><i class="fa fa-trash"></i></button>
                   </form></td>
                </tr>
             <?php endwhile; ?>
            </tbody>
        </table>
    </div>