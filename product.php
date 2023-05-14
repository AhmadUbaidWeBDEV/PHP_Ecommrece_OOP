<?php include 'header.php'; ?>
<?php 
    if(isset($_GET['name'])){
        $title = $_GET['name'];
        $id = $_GET['item'];
        $db = new Database();
        $productObj = $db->select("SELECT * FROM products WHERE id = '$id' AND title = '$title' ");
        $product = $productObj->fetch_assoc();
    }


    if(isset($_POST['addItemBtn'])){
      $pid = $_POST['productId'];
      $pqty = $_POST['pqty'];
      $db = new Database();
      $cartObj = new Cart();
      
      $result = $db->select("SELECT * FROM products WHERE id = '$pid' ");
      $product = $result->fetch_assoc();
      $title = $product['title'];
      $price = $product['sale_price'];
      $stock =$product['status'];
      if(($pqty>0)&&($pqty<=$stock)){
      $cartObj->updateCart1($pid, $title, $price,$pqty,$stock);
      }else{
        echo '<script language="javascript">';
            echo 'alert("Invalid Quanitity Selected")';
            echo '</script>';
      }
  }


?>    
    <div class="flex-boxCart">
        <div class="leftCart">
            <div class="big-imgCart">
                <img src=" ./uploads/product/<?php echo $product['thumbnail_image']; ?>">
                
            </div>
       
        </div>

        <div class="rightCart">
        <?php if(isset( $product['category_id'])){
                             
                             $catid=$product['category_id'];
                             
                             
                         $run_data= $db->select("SELECT * FROM categories WHERE cid = '$catid'");
                             while($row1 = mysqli_fetch_array($run_data)){
                                        $catname=$row1['name'];
     
                             }
                             ?>
                                           <div class="urlCart">Category > <?php echo $catname; ?></div>
                             <?php }?>   
                    
                  <form action="product.php" method="post">  

            <div class="pnameCart"><?php echo $product['title']; ?></div>
            <input type="hidden" name="productId" value="<?php echo $product['id']; ?>">         
            <div class="priceCart">Price $ <?php echo $product['sale_price']; ?></div>
            <?php $outofstock=$product['status']; ?>
            <?php if($outofstock!=0){ ?>
            <div style="font-size: small;" class="priceCart">Avalible in stock <?php echo $product['status']; ?> items</div>
            <div class="quantityCart">
            <input type="number" id="myInput" name="pqty" step="any" min="1"  placeholder="1" required/>


        </div>
            <div class="btn-boxCart">
                <button type="submit"  name="addItemBtn" class="addItemBtn">Add to Cart</button>
             
            </div>
            <?php }else{ ?>
                    <div style="font-size: medium;" class="priceCart"> <?php echo "out of stock"; ?></div>
           <?php }?>
                
         
            </form>
        </div>
    </div>
    
    <?php include 'footer1.php';?>
  