<?php include 'header.php'; ?>
<?php 
    $current_user_id = $_SESSION['userid'];
    $db = new Database();
    $user_info = $db->select("SELECT * FROM users WHERE id = '$current_user_id' ")->fetch_assoc();
    $orders = $db->select("SELECT * FROM orders");   
?>

<?php 
                //    $result = $db->select("SELECT product_name, unit_price, quantity FROM order_items WHERE order_id = '$oid' ");
 //   $orderdetail = $result->fetch_assoc(); ?>


<div style=" max-width:1300px;" class="container888">
 
<div style="display:flex;justify-content:center;padding-bottom:60px;"><h3 style="margin-top: 70px; color:gray; font-size:30px;"><span style="margin-top: 50px;"> Costumer orders</span></h3></div>

<table width="100%" style=" border-collapse: collapse;border-bottom:1px solid #eee;">
   <tr>
                    <th width="12%" class="column-header777">Order id</th>
                    <th width="12%" class="column-header777">Order Date</th>
                    <th width="12%" class="column-header777">user id</th>
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
                    <td class="row777"><a href="./orderdetails.php?order_id=<?php echo $order['id']; ?>"><button class="btn btn-primary"><i style="padding: 10px; background-color:#FFD9E8;" class="fa fa-eye"></i></button></a></td>
                </tr> 
                <?php } ?>
</table><br>
</div>

