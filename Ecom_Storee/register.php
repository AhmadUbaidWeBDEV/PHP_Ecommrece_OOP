
<?php include 'header.php'; 

$db = new Database();
  
    if(isset($_POST['register'])){
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $User_Role = $_POST['User_Role'];
        $password = $_POST['password'];
        $insert = $db->insert("INSERT INTO users(name, phone, email, User_Role,password) VALUES('$name', '$phone', '$email', '$User_Role','$password')");
        if($insert){
            echo '<script language="javascript">';
            echo 'alert("Registed successfully ")';
            echo '</script>';
            
        }else{
            echo $conn->error;
        }
    }



?>
<section class="container">
      <h1>Register</h1>
      <form action="register.php" method="POST"  enctype="multipart/form-data" class="form">
        <div class="input-box">
        <input type="text" name="name" placeholder="Enter  Name" required/>
        </div>
        <div class="input-box">
        <input type="text" name="phone" placeholder="Enter phone Number" required />
        </div>
 
  <div class="input-box">
  <input type="text" name="email" placeholder="Enter Email" required />
  </div>     
  <div class="select-box">
  <select name="User_Role">
  <option hidden>Select USER Role</option>
  
  <option>costumer</option>
  </select>
  </div>
  <div class="input-box">
  <input type="text" name="password" placeholder="Enter Password" required />
  </div>
  <button type="submit" value="register" name="register">Register</button>
  </form>
    </section>
    <?php include 'footer.php';?>
              