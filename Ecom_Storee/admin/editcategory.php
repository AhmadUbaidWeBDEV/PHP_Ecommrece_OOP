<?php include 'header.php'; ?>
<?php 
    $db = new Database();
    //Product Information
    $categoryId = $_GET['category'];
    $result = $db->select("SELECT * FROM categories WHERE cid = '$categoryId' ");
    $category = $result->fetch_assoc();

    // Category Information
    $db = new Database();
    $categories = $db->select("SELECT * FROM categories  ");

?>
<section class="container">
      <h1>Edit Category</h1>
      <form action="categories.php" method="POST"  enctype="multipart/form-data" class="form">

      <div class="select-box">
  <select name="category_id">
  <?php while($row = $categories->fetch_assoc()){ ?>
    <option <?php echo $row['cid'] == $category['cid'] ? 'selected':''; ?> value="<?php echo $row['cid']; ?>"><?php echo $row['name']; ?></option>
<?php } ?>
  </select>
  </div>
        <div class="input-box">
        <input type="text" name="name" placeholder="Enter name"  value="<?php echo $category['name']; ?>">
         <input type="hidden" name="cid" value="<?php echo $category['cid']; ?>">
        </div>
 
      
        <button type="submit" value="Update Category" name="updateCategory">Update</button>
      </form>
    </section>
              