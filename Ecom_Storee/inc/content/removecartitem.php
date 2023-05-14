<?php include '../database.php'; ?>
<?php
    if(isset($_POST['removeItem'])){
        $pid = $_POST['product_id'];
        session_start();
        $cart = $_SESSION['cart'];
        unset($cart['products'][$pid]);
        $_SESSION['cart'] = $cart;
        if($cart['products'] == null){
            unset($_SESSION['cart']);
        }
    }
    
?>


<thead>

<tr>
        <th style="text-align: center;">Product Name </th>
        <th style="text-align:center;">Unit Price </th>
        <th style="text-align: center;">Quantity</th>
        <th style="text-align: center;">Price </th>
        <th style="text-align: center;">Action</th>
</tr>
</thead>
<tbody>
<?php foreach($cart['products'] as $product){ ?>

<tr>
<td class="text-left"><?php echo $product['title']; ?></td>
<td><?php echo $product['price']; ?></td>
<td class="text-center"><?php echo $product['quantity']; ?></td>
<td class="text-right pr-5" style="width: 15%;">$ <span class="price"><?php echo number_format($product['price']*$product['quantity'], 2, '.', ''); ?></span> </td>
<form action="removecartitem.php" method="post">
    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
<td><button type="submit"  name="removeItem" class="removeBtn" style="color: white;margin-left:10px;border: none;padding: 7px 20px;border-radius: 8px;background-color:#FF1A03;color: #e6e7e8;"  ><i class="fa fa-trash"></i></button></td>
</form>
</tr>
<?php } ?>   
</tbody>

<script>

    updatePrice();
    function updatePrice(){
        var sum = 0;
        $('.price').each(function(){
            sum += parseFloat($(this).text());  
        });

        if(sum!==0){
        var deliveryCharge = parseInt($('.deliveryCharge').text());
        var totalPrice = sum + deliveryCharge;
        totalPrice = totalPrice.toFixed(2);
        sum = sum.toFixed(2);
        $('.subTotal').text(sum);
        $('.totalPrice').text(totalPrice);
    }else{
        $('.subTotal').text(sum);
        $('.totalPrice').text(0);
        $('.deliveryCharge').text(0);
        $('.checkout').css("display","none");
    }
    }
  // cart item count

</script>