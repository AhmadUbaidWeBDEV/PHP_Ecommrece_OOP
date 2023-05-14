<?php include 'header.php'; ?>
<?php 

    // session_start();
    if(isset($_POST['removeItem'])){
        $pid = $_POST['product_id'];
        $cart = $_SESSION['cart'];
        unset($cart['products'][$pid]);
        $_SESSION['cart'] = $cart;
        if($cart['products'] == null){
            unset($_SESSION['cart']);
        }
    }

   
    $subtotal=0;
    $GrandTotal=0;
    $delivery_charge = 100;
?>
<?php if(!isset($_SESSION['cart'])){ ?>
    <div class="container text-center">
        <h1 class="text-primary" style="margin: 200px 0;">There is no item in your cart. Please add item.</h1>
    </div>
<?php } else{ 
        $cart = $_SESSION['cart'];
    ?>

    <div class="header_fixed">
        <table class="tbl" >
            <thead>
                <tr>    <th style="text-align: center;">delete</th>
                <th style="text-align: center;">Product Name </th>        
                <th style="text-align:center;">Unit Price </th>
                        <th style="text-align: center;">Quantity</th>
                        <th style="text-align: center;">Price </th>
                </tr>
            </thead>
            <tbody>
            <?php 
            
           
            foreach($cart['products'] as $product){ ?>
            <tr>
            <form action="cart.php" method="post">
            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
            <td><button type="submit" name="removeItem" class="removeBtn" style="color: white;border: none;padding: 7px 20px;border-radius: 8px;background-color:#FF1A03;color: #e6e7e8;"  ><i class="fa fa-trash"></i></button></td>
            <td class="text-left"><?php echo $product['title']; ?></td>
            <td><?php echo $product['price']; ?></td>
            <td class="text-center"><input type="number" name="pqty" style="width: 40px;text-align:center;"  min="1" value="<?php echo $product['quantity']; ?>"></td>
            <?php $productSubtotal=number_format($product['price']*$product['quantity'], 2, '.', '');?>
            <td class="text-right pr-5" style="width: 15%;">$ <span class="price"><?php echo $productSubtotal; ?></span> </td>
           
           
            </tr>
            <?php $subtotal=$productSubtotal+$subtotal;
            $key=$product['id'];
            $value=$product['quantity'];
            $array = array($key=>$value);
         foreach ($array as $key => $value) {
    // Add the key-value pair to the associative array
            $array[$key] = $value;
             echo "Key=" . $key . ", Value=" . $value;
    
           
             $updatecart['products'][$key] = ['id' => $key,'quantity' => $value];
           
             echo "<br>";
}

            ?>
            
          <?php }
     
      
                 $GrandTotal=$subtotal+$delivery_charge;
          ?>   
          <?php
          
          ?>
            </tbody>
        </table>
           </form>
        <div style="display:flex; justify-content:end; margin-top:50px;margin-right:135px;">  
      
        <?php 
        
            
        if($GrandTotal!=0){?>
        <table  id="cartTable">
            <thead><tr>
                <th></th>
                <th>Grand Total</th>
            </tr></thead>
        
            <tr>
                <td>Subtotal Total</td>
                <td >$ <span><?php echo $subtotal;?></span></td>
            </tr>
            <tr>
                <td>Delivery Charge</td>
                <td >$ <span><?php echo $delivery_charge; ?></span> </td>
            </tr>
            <tr>
                <td>Total Price</td>
                <td >$ <span><?php echo $GrandTotal; ?></span></td>
            </tr>
            <tr>
                <td></td>
                <td ><a href="checkout.php" class="checkout" style="border-radius:5px;  background-color:#007BFF ; color:white; text-decoration:none; padding-top:10px; padding-bottom:10px;  padding-right:75px; padding-left:75px;">Checkout</a></td>
            </tr>
        </table>
        <?php } ?>
    </div>
    </div>
            

<?php }include 'footer.php'; ?>