<?php include 'header.php'; ?>
<?php 

    // session_start();
    if(isset($_SESSION['username'])){
    if(isset($_SESSION['cart'])){
        $cart = $_SESSION['cart'];
        $product_count = count($cart['products']);
      }else{
        echo '<script>window.location.replace("cart.php");</script>';
        exit();
    }
  }else{
    echo '<script>alert("Login in your account to place order");</script>';  
    echo '<script>window.location.replace("login.php");</script>';

    exit();
  }
 
    $delivery_charge = $db->select("SELECT meta_value FROM settings WHERE meta_key = 'Delivery Charge' ");
    $delivery_charge = $delivery_charge->fetch_assoc();
    $delivery_charge = $delivery_charge['meta_value'];
    $calsubtotal=0;
    $GrandTotal=0;
   
?>
<?php if(isset($_POST['placeOrder'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $user_phone = $_POST['phone'];
    $user_email = $_POST['email'];
    $address = $_POST['address'];
    $subtotal = $_POST['subtotal'];
    $delivery_charge = $_POST['delivery_charge'];
    $total_price = $_POST['total_price'];
    $zipcode=$_POST['zipcode'];
    $city=$_POST['city'];
    $country=$_POST['country'];
    $state=$_POST['state'];
    if(isset($_SESSION['userid'])){
      $user_id = $_SESSION['userid'];
    }else{
      echo '<script>window.location.replace("login.php");</script>';
    }
    $db = new Database();
    $insert = $db->insert("INSERT INTO orders(user_id, first_name,last_name, user_phone, user_email, address, subtotal, delivery_charge, total_price,zipcode,city,country,state) VALUES('$user_id', '$first_name','$last_name', '$user_phone', '$user_email', '$address', '$subtotal', '$delivery_charge', '$total_price','$zipcode','$city','$country','$state') ");
    $insert_id = $db->getLastId();

    $products = $cart['products'];
    foreach($products as $product){
        $title = $product['title'];
        $quantity = $product['quantity'];
        $price = $product['price'];
        $prodtotal=number_format($product['price']*$product['quantity'], 2, '.', '');
        $insert_item = $db->insert("INSERT INTO order_items(order_id, product_name, unit_price, quantity,product_subtotal) VALUES('$insert_id', '$title', '$price', '$quantity','$prodtotal') ");
    }
    if($insert && $insert_item){
      echo '<script language="javascript">';
            echo 'alert("Order placed Successfully")';
            echo '</script>';
            echo '<script>window.location.replace("myaccount.php");</script>';
        unset($_SESSION['cart']);
        $cart['products'] = [];
        $product_count = '';
    }
}else{

} ?>

<div class="container01">
  <div class="title01">
      <h2 class="h12">Checkout Form</h2>
  </div>
<div class="d-flex11">
<?php
            $user_id = $_SESSION['userid'];
            $db = new Database();
            $result = $db->select("SELECT * FROM users WHERE id = '$user_id'");
      while($row = $result->fetch_assoc()): ?>
 
  <div class="Yorder">
    <table class="tblcheckout">
    
      <tr class="trcheckout">
        <th class="thcheckout" colspan="2">Your order</th>
      </tr>
      <?php foreach($cart['products'] as $cart){ ?>
      <tr class="trcheckout">
      <?php $productSubtotal=number_format($cart['price']*$cart['quantity'], 2, '.', '');?>
        <td class="tdcheckout"><?php echo $cart['title']; ?> <small class="text-muted">(Quantity) <?php echo $cart['quantity']; ?> <span> * (Unit Price) <?php echo $cart['price']; ?></span>  </small></td>
        <td style="display:flex;"  class="price">$ <?php echo $productSubtotal; ?></td>
      </tr>
  
      <?php
    $calsubtotal=$productSubtotal+$calsubtotal;  
    }
      
      
    
    $GrandTotal=$calsubtotal+$delivery_charge;
      ?>      
    </table><br>
    <?php if($GrandTotal!=0){?>
      <ul style="list-style-type:none;">
        <li>Subtotal <span style="margin-left: 65px;">$ <span class="subTotal"></span><?php echo $calsubtotal;?> </span></li>
        <li>Shipping Fee <span  style="margin-left: 30px;">$ <span class="deliveryCharge"><?php echo $delivery_charge; ?></span> </span></li>
        <li style="font-weight: 500;">Total Price <span  style="margin-left: 50px;">$<span class="totalPrice"><?php echo $GrandTotal;?></span> </span></li>      
        </ul>
        <?php }?>
  </div><!-- Yorder -->
  <form class="formcheckout" action="checkout.php" method="post">
    <label class="labelcheckout">
      <span id="spancheckout" class="fname11">First Name <span id="spancheckout" class="required">*</span></span>
      <input class="inputcheckout" type="text"   placeholder="Enter First Name" class="form-control" name="first_name" required>
    </label>
    <label class="labelcheckout">
      <span id="spancheckout" class="fname11">Last Name <span id="spancheckout" class="required">*</span></span>
      <input class="inputcheckout" type="text"   placeholder="Enter Last Name" class="form-control" name="last_name" required>
    </label>
    <label  class="labelcheckout">
      <span id="spancheckout">Billing Address <span class="required">*</span></span>
      <input class="inputcheckout" type="text" name="address" placeholder="Enter House number and street name" required>
    </label>
    <label class="labelcheckout">
      <span id="spancheckout">Phone <span class="required">*</span></span>
      <input class="inputcheckout" type="tel" name="phone" value="<?php echo $row['phone']; ?>" placeholder="<?php echo $row['phone']; ?>" required> 
    </label>
    <label class="labelcheckout">
      <span id="spancheckout">Email Address <span class="required">*</span></span>
      <input class="inputcheckout" type="email" name="email" value="<?php echo $row['email']; ?>" placeholder="<?php echo $row['email']; ?>" required> 
    </label>
    <label class="labelcheckout">
      <span id="spancheckout" class="fname11"> zipcode <span id="spancheckout" class="required">*</span></span>
      <input class="inputcheckout" type="text"   placeholder="Enter zip/postal code" class="form-control" name="zipcode" required>
    </label>
    <label class="labelcheckout">
      <span id="spancheckout" class="fname11"> country <span id="spancheckout" class="required">*</span></span>
      <input class="inputcheckout" type="text"   placeholder="Enter country name" class="form-control" name="country" required>
    </label>
    <label class="labelcheckout">
      <span id="spancheckout" class="fname11"> city <span id="spancheckout" class="required">*</span></span>
      <input class="inputcheckout" type="text"   placeholder="Enter city name" class="form-control" name="city" required>
    </label>
    <label class="labelcheckout">
      <span id="spancheckout" class="fname11"> state <span id="spancheckout" class="required">*</span></span>
      <input class="inputcheckout" type="text"   placeholder="Enter state name" class="form-control" name="state" required>
    </label>
    <?php endwhile; ?>
         <input type="hidden" name="subtotal" value="<?php echo $calsubtotal;?> " >
          <input type="hidden" name="delivery_charge" value="<?php echo $delivery_charge;?> " >
          <input type="hidden" name="total_price" value="<?php echo $GrandTotal;?> ">
    <div style="display: flex; justify-content:end;"><button name="placeOrder" class="btncheckout" type="submit">Place Order</button></div>
  </form>
 </div>
</div>

<?php include 'footer.php'; ?>


