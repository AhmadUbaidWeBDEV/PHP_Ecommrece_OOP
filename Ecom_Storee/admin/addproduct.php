<?php include 'header.php'; ?>
<?php 

    $db = new Database();
    $categories = $db->select("SELECT * FROM `categories` ORDER BY `categories`.`cid` DESC");

?>


<section class="container">
      <h1>Add Product</h1>
      <form action="products.php" method="POST"  enctype="multipart/form-data" class="form">
      <div class="input-box">
      <input type="text" name="title" placeholder="Enter Product name" required/>
      </div>
      <div class="input-box">
      <input type="number" id="myInput" min="0"  name="sale_price" placeholder="Enter Product Price" required />
      </div>
 
  <div class="input-box">
  <input type="number" id="myInput" min="0" name="status" placeholder="Enter Product Stock" required />
</div>     
<div class="select-box">
<select name="category_id">
<option hidden>Select Category</option>
   <?php while($row = $categories->fetch_assoc()){?>
   <option value="<?php echo $row['cid']; ?>"><?php echo $row['name']; ?></option>
   <?php } ?>
   </select>
   </div>
  
 <div class="input-box">
          <input type="file" name="thumbnail_image"required />    
        </div>
 
        <button type="submit" value="Add Product" name="addProduct">Add</button>
      </form>
    </section>




    <?php include 'footer.php'; ?>
    