<?php include 'header.php'; ?>
<?php 
  $current_user_id = $_SESSION['userid'];
  $db = new Database();
  $user_info = $db->select("SELECT * FROM users WHERE id = '$current_user_id' ")->fetch_assoc();
  $orders = $db->select("SELECT * FROM orders WHERE user_id = '$current_user_id' ");  
    if(isset($_POST['accountinfoupdate'])){
      $name = $_POST['name'];
      $phone = $_POST['phone'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $update = $db->update("UPDATE users SET name = '$name',phone='$phone',email='$email',password='$password' WHERE id = '$current_user_id' ");
      if($update){
          echo '<script language="javascript">';
          echo 'alert("Account info Updated successfully ")';
          echo '</script>';
          echo '<script>window.location.replace("myaccount.php");</script>';
      }else{
          echo $conn->error;
      }
  }


?>

    <?php 
?>
<div class="tabset">
  <!-- Tab 1 -->
  <input type="radio"  name="tabset" id="tab1" aria-controls="marzen" checked>
  <label class="lbl717" for="tab1">Account Info</label>
  <!-- Tab 2 -->
  <input type="radio" name="tabset" id="tab2" aria-controls="rauchbier">
  <label class="lbl717" for="tab2">My orders</label>
  
  <div class="tab-panels">
    <section id="marzen" class="tab-panel">
    <section class="container">
      <h1>Account INFO</h1>
      <form action="myaccount.php" method="POST"  enctype="multipart/form-data" class="form">
        <div class="input-box">
        <input type="text" name="name" value="<?php echo $user_info['name']; ?>" placeholder="Enter  Name" required/>
        </div>
        <div class="input-box">
        <input type="text" name="phone" value="<?php echo $user_info['phone']; ?>" placeholder="Enter phone Number" required />
        </div>
 
  <div class="input-box">
  <input type="text" name="email" value="<?php echo $user_info['email']; ?>"  placeholder="Enter Email" required />
  </div>     
  <div class="input-box">
  <input type="text" name="password" value="<?php echo $user_info['password']; ?>" placeholder="Enter Password" required />
  </div>
  <button type="submit" value="accountinfoupdate" name="accountinfoupdate">Update Account Info</button>
  </form>
    </section>    
  
  </section>
    <section id="rauchbier" class="tab-panel">
     
<?php if($orders !=null){ ?>
  


  <div style="margin-left:180px; margin-top: 20px; max-width:80%;" class="container888">
  <div style="background: #ffd9e8 url(https://cdn4.iconfinder.com/data/icons/basic-ui-2-line/32/shopping-cart-shop-drop-trolly-128.png) no-repeat;width: 50px;height: 50px;margin-right: 10px;background-position: center;background-size: 25px;float: left; margin-bottom: 15px;"></div> 
  <h3>My orders</h3>
  
   <table  width="100%" style=" border-collapse: collapse;border-bottom:1px solid #eee;">
     <tr>
                      <th width="15%" class="column-header777">Order id</th>
                      <th width="15%" class="column-header777">Order Date</th>
                      <th width="15%" class="column-header777">user id</th>
                      <th width="12%" class="column-header777">Address</th>
                      <th width="12%" class="column-header777">Subtotal</th>
                      <th width="12%" class="column-header777">Shipping Fee</th>
                      <th width="12%" class="column-header777">Total</th>
                      <th width="12%" class="column-header777">Details</th>     
     </tr>
  
     <?php while($order = $orders->fetch_assoc()){ ?>
                    <tr class="text-center">
                      <td class="row777"><?php echo $order['id']; ?></td>
                      <td class="row777"><?php echo $order['created_at']; ?></td>
                      <td class="row777"><?php echo $order['user_id']; ?></td>
                      <td class="row777"><?php echo $order['address']; ?></td>
                      <td class="row777">$ <?php echo $order['subtotal']; ?></td>
                      <td class="row777">$ <?php echo $order['delivery_charge']; ?></td>
                      <td class="row777">$ <?php echo $order['total_price']; ?></td>
                      <td class="row777"><a href="orderdetails.php?order_id=<?php echo $order['id']; ?>"><button class="btn btn-primary"><i style="padding: 10px; background-color:#FFD9E8" class="fa fa-eye"></i></button></a></td>
                  </tr> 
                  <?php } ?>
  </table><br>
  </div>
  
  
    </section>
  </div>
  
</div>








<?php } include './footer2.php'; ?>
