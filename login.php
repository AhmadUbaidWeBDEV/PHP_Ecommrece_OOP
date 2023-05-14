<?php include 'header.php';
      if(isset($_POST['login'])){
         $email = $_POST['email'];
         $password = $_POST['password'];
         $db = new Database();
         $result = $db->select("SELECT * FROM users WHERE email = '$email' AND password = '$password' ");
         if($result){
            $res = $result->fetch_assoc();
            $name = $res['name'];
            $id = $res['id'];
            $is_admin = $res['User_Role'];
            if($is_admin != "admin"){
              $_SESSION['userid'] = $id;
              $_SESSION['username'] = $name;
              $_SESSION['userrole'] =$is_admin;   
              if(isset($_SESSION['cart'])){
                $cart = $_SESSION['cart'];
                $product_count = count($cart['products']);
                echo '<script>window.location.replace("checkout.php");</script>';
              }else{
                echo '<script>window.location.replace("index.php");</script>';
              }
             
              }else{
              $_SESSION['userid'] = $id;
              $_SESSION['username'] = $name;
              $_SESSION['userrole'] =$is_admin;
              if(isset($_SESSION['cart'])){
                $cart = $_SESSION['cart'];
                $product_count = count($cart['products']);
                echo '<script>window.location.replace("checkout.php");</script>';
              }else{
                echo '<script>window.location.replace("admin/index.php");</script>';
              }
             
             }
    }else{
      echo '<script>alert("Email or password is incorret ")</script>';
    }
  }
?>





  <div class="logincontainer">
        <div class="login_forms">
            <div class="forms logins">
                <span class="title">Login</span>
                <form action="login.php" method="post">
                    <div class="input-field1">
                        <input type="text" placeholder="Enter your email" name="email" required/>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field1">
                        <input type="password" class="password" placeholder="Enter your password" name="password" required/>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                   

                    <div class="input-field1 button1">
                        <input type="submit" name="login" class="signupbtn" value="Login">
                    </div>
                </form>

                <div class="login-signup">
                    
                </div>
            </div>
            <!-- Registration Form -->
        </div>
    </div>

    <?php include 'footer.php';?>