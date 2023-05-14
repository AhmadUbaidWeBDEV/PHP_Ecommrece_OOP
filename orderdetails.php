<?php include 'header.php'; ?>
<?php 
    if(!isset($_GET['order_id'])){
        header('Location: index.php');
    }
    $order_id = $_GET['order_id'];
    $db = new Database();
    $result = $db->select("SELECT * FROM orders WHERE id = '$order_id' ");
    $order = $result->fetch_assoc();
    $result = $db->select("SELECT * FROM order_items WHERE order_id = '$order_id' ");

?>

<div class="container888">

<table width="100%">
  <tr>
    
    <td width="300px"><div style="background: #ffd9e8;border-left: 15px solid #fff;padding-left: 30px;font-size: 26px;font-weight: bold;letter-spacing: -1px;height: 73px;line-height: 75px;">Order details</div></td>
    <td></td>
  </tr>
</table> 
<br><br>

<table width="100%" style="border-collapse: collapse;">
  <tr>
    <td widdth="50%" style="background:#eee;padding:20px;">
    <strong>Order-ID:</strong> <?php echo $order['id']; ?><br>  
    <strong>Date:</strong> <?php echo $order['created_at']; ?><br>
      <strong>Location:</strong> <?php echo $order['city']; ?> , <?php echo $order['country']; ?><br>
      
    </td>
    <td style="background:#eee;padding:20px;">
    <strong>Name:</strong>   <?php echo $order['first_name']; ?>  <?php echo $order['last_name']; ?><br>
      <strong>E-mail:</strong>   <?php echo $order['user_email']; ?><br>
      <strong>Billing Address:   </strong><?php echo $order['address']; ?><br>
    </td>
  </tr>
</table><br>


<div style="background: #ffd9e8 url(https://cdn4.iconfinder.com/data/icons/basic-ui-2-line/32/shopping-cart-shop-drop-trolly-128.png) no-repeat;width: 50px;height: 50px;margin-right: 10px;background-position: center;background-size: 25px;float: left; margin-bottom: 15px;"></div> 
<h3>Order item details</h3>

 <table width="100%" style="border-collapse: collapse;border-bottom:1px solid #eee;">
   <tr>
     <td width="25%" class="column-header777">Product Name</td>
     <td width="25%" class="column-header777">Unit Price</td>
     <td width="25%" class="column-header777">Quantity</td>
     <td width="25%" class="column-header777">Product Sub Total</td>
   </tr>
   <?php while($row = $result->fetch_assoc()){ ?>
                <tr>
                    <td class="row777"><?php echo $row['product_name']; ?></td>
                    <td class="row777"><?php echo $row['unit_price']; ?></td>
                    <td class="row777"><?php echo $row['quantity']; ?></td>
                    <td class="row777">$ <?php echo $row['product_subtotal']; ?></td>
                </tr>
                <?php } ?>

 
</table><br>

<table width="100%" style="background:#eee;padding:20px;">
  <tr>
    <td>
      <table width="300px" style="float:right">
        <tr>
          <td><strong>Sub-total:</strong></td>
          <td style="text-align:right">$ <?php echo $order['subtotal']; ?></td>
        </tr>  
        <tr>
          <td><strong>Shipping fee:</strong></td>    
          <td style="text-align:right">$ <?php echo $order['delivery_charge']; ?></td>
        </tr>
        <tr>
          <td><strong>Grand Total:</strong></td>    
          <td style="text-align:right">$ <?php echo $order['total_price']; ?></td>
        </tr>
      </table>
     </td>
  </tr>
</table>

</div>









<?php include './footer.php'; ?>