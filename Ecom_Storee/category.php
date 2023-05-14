<?php include 'header.php'; ?>
<?php


if(isset($_POST['addtocart'])){
    $pid = $_POST['productId'];

    $cartObj = new Cart();
    $result = $db->select("SELECT * FROM products WHERE id = '$pid' ");
    $product = $result->fetch_assoc();
    $title = $product['title'];
    $price = $product['sale_price'];
    $stock =$product['status'];
  
    $cartObj->add_to_cart($pid, $title, $price,$stock);
$ciid=$_POST['catid'] ; 
if(isset($_SESSION['cart'])){
  $cart = $_SESSION['cart'];
if(isset($cart['products'][$pid]['quantity'])){
  $quantiy = $cart['products'][$pid]['quantity'];  

if($quantiy>=$stock){
  echo '<script language="javascript">';
  echo 'alert("Limit Exeeded only '.$stock.' items avalible in Stock")';
  echo '</script>';
}else{
  echo '<script language="javascript">';
  echo 'alert("Add to cart successfully ")';
  echo '</script>';
}
}
}


if(isset($ciid)){
 echo '<script>window.location.replace("category.php?id='.$ciid.'");</script>';
}
}






    // session_start();
    if(!isset($_GET['id'])){
      echo '<script>window.location.replace("index.php");</script>';
      
      
    }
    $catid = $_GET['id'];
    $db = new Database();
    $res = $db->select("SELECT * FROM products WHERE category_id  = '$catid' ");

    if($res==null){
       echo '<script>alert("Selected Category has no products avalible");</script>';  
       echo '<script>window.location.replace("index.php");</script>';
    }



?>


<?php if(isset( $catid )){
                             
  $run_data= $db->select("SELECT * FROM categories WHERE cid = '$catid'");
    while($row1 = mysqli_fetch_array($run_data)){
              $catname=$row1['name'];
}
                                                          ?>
                              <h1 style="display:block; margin-bottom: 20px; margin-top:10px;  text-align: center; border:none; color:gray;">  <?php echo $catname; ?></h1>
                             
                                                          <?php }?>  



     
                             <div style="margin-top: 30px;" class="productsShop">


              <?php while($product = $res->fetch_assoc()){ ?>
                <form action="category.php"  method="post">
              <div  class="productShop">
              <div class="imageShop">
              <a href="product.php?name=<?php echo $product['title']; ?>&&item=<?php echo $product['id']; ?>">  <img  src=" ./uploads/product/<?php echo $product['thumbnail_image']; ?>"></a>
              <input type="hidden" name="productId" value="<?php echo $product['id']; ?>">
              <input type="hidden" name="catid" value="<?php echo $catid; ?>">
              
              </div>
              
              <div class="namePriceShop">
                  <h3> <a href="product.php?name=<?php echo $product['title']; ?>&&item=<?php echo $product['id']; ?>"> <?php echo $product['title']; ?></a> </h3>
                  <a style="font-size: 15px;" href="product.php?name=<?php echo $product['title']; ?>&&item=<?php echo $product['id']; ?>"><span>$<?php echo $product['sale_price']; ?></span></a>
              </div>
              <?php $outofstock=$product['status']; ?>
            <?php if($outofstock!=0){ ?>
              <div class="bayShop">
            
              <a style="text-decoration: none;" class="bayShopprod" href="product.php?name=<?php echo $product['title']; ?>&&item=<?php echo $product['id']; ?>"><?php echo $product['status']; ?> Items</a>
              <button  name="addtocart" class="addtocart" >Add to cart</button>
              </div>
              <?php }else{ ?>
                <a style="text-decoration: none;background-color:red; color:white;" class="bayShopprod" href="product.php?name=<?php echo $fproduct['title']; ?>&&item=<?php echo $fproduct['id']; ?>"> out of Stock</a>
           <?php }?>
          </div>
              </form>
              <?php } ?>
                             </div>
    


<?php include 'footer.php'; ?>
