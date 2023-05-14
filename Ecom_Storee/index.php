<?php include 'header.php';
  $db = new Database();
//$updatecart=$_SESSION['updatecart'];
//$key=0;
//$value=0;


  $btncheck=0;
  if(isset($_POST['addtocart'])){
    $pid = $_POST['productId'];

    $cartObj = new Cart();
    $result = $db->select("SELECT * FROM products WHERE id = '$pid' ");
    $product = $result->fetch_assoc();
    $title = $product['title'];
    $price = $product['sale_price'];
    $stock =$product['status'];
    $cartObj->add_to_cart($pid, $title, $price,$stock);
    if(isset($_SESSION['cart'])){
      $cart = $_SESSION['cart'];
   if(isset($cart['products'][$pid]['quantity'])){
      $quantiy = $cart['products'][$pid]['quantity'];  
   
    if($quantiy>=$stock){
      echo '<script language="javascript">';
      echo 'alert("Limit Exeeded only '.$stock.' items avalible in Stock")';
      echo '</script>';
      $btncheck=1;
    }else{
      echo '<script language="javascript">';
      echo 'alert("Add to cart successfully ")';
      echo '</script>';
    }
  }
  }
   
    
}
  $fproducts = $db->select("SELECT * FROM products");


  
?>
  

  <h1 style="display:block; margin-bottom: 20px; margin-top:20px;  text-align: center; border:none; color:gray;">Products</h1>

  <div style="margin-top: 20px;" class="productsShop">
<?php while($fproduct = $fproducts->fetch_assoc()){ ?>
  
  
      <form action="index.php"  method="post">
      
          <div class="productShop"><a href="product.php?name=<?php echo $fproduct['title']; ?>&&item=<?php echo $fproduct['id']; ?>">
          
              <div class="imageShop">
              <a href="product.php?name=<?php echo $fproduct['title']; ?>&&item=<?php echo $fproduct['id']; ?>"> <img  src="./uploads/product/<?php echo $fproduct['thumbnail_image']; ?>"></a>
            <input type="hidden" name="productId" value="<?php echo $fproduct['id']; ?>"> 
            </div>
              
              <div class="namePriceShop">
                  <h3> <a href="product.php?name=<?php echo $fproduct['title']; ?>&&item=<?php echo $fproduct['id']; ?>"> <?php echo $fproduct['title']; ?></a> </h3>
                  <a style="font-size: 15px;" href="product.php?name=<?php echo $fproduct['title']; ?>&&item=<?php echo $fproduct['id']; ?>"><span>$ <?php echo $fproduct['sale_price']; ?></span></a>
              </div>
              <?php $outofstock=$fproduct['status']; ?>
            <?php if($outofstock!=0){ ?>
              <div class="bayShop">
              <a style="text-decoration: none;" class="bayShopprod" href="product.php?name=<?php echo $fproduct['title']; ?>&&item=<?php echo $fproduct['id']; ?>"><?php echo $fproduct['status']; ?> in  Stock</a>
              <button  name="addtocart" class="addtocart" >Add to cart</button>
              </div>
              </a>
              <?php }else{ ?>
                <a style="text-decoration: none; background-color:red; color:white;" class="bayShopprod" href="product.php?name=<?php echo $fproduct['title']; ?>&&item=<?php echo $fproduct['id']; ?>"> out of Stock</a>
           <?php }?>
          </div>
          </form>
          
          <?php } ?>
      </div>
      <?php include 'footer.php';?>
      <script>
