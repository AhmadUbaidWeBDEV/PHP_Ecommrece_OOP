<?php include 'header.php'; ?>
<?php 
    $db = new Database();
    //Product Information
    $productId = $_GET['product_id'];
    $result = $db->select("SELECT * FROM products WHERE id = '$productId' ");
    $product = $result->fetch_assoc();

    // Category Information
    $db = new Database();
    $categories = $db->select("SELECT * FROM categories  ");

?>



<section class="container">
      <h1>Edit Product</h1>
      <div style="display:flex; justify-content:center; margin-top:20px"><img style="width:150px; height:100px; border:4px solid lightgray; border-radius:8px;" src="../uploads/product/<?php echo $product['thumbnail_image']; ?>" > </div>
      <form action="products.php" method="POST"  enctype="multipart/form-data" class="form">
        <div class="input-box">
        <input type="text" name="title" placeholder="Enter Product name"  value="<?php echo $product['title']; ?>">
        <input type="hidden" name="pid" value="<?php echo $product['id']; ?>">
        </div>
        <div class="input-box">
        <input type="number" name="sale_price" placeholder="Enter Product Price" value="<?php echo $product['sale_price']; ?>" >
        </div>
 
  <div class="input-box">
  <input type="number" name="status" placeholder="Enter Product Stock" value="<?php echo $product['status']; ?>">
</div>     
<div class="select-box">
<select name="category_id">
        <?php while($row = $categories->fetch_assoc()){?>
        <option value="<?php echo $row['cid']; ?>"><?php echo $row['name']; ?></option>
        <?php } ?>
</select>
</div>
  
 <div class="input-box">
     
          <input type="file" name="thumbnail_image">    
          <input type="hidden"  name="old_image" value="<?=$product['thumbnail_image']?>"> 
</div>
 
        <button type="submit" value="Update Product" name="updateProduct">Update</button>
      </form>
    </section>




