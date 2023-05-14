<?php include 'header.php'; ?>
<section class="container">
      <h1>Add Category</h1>
      <form action="categories.php" method="POST"  enctype="multipart/form-data" class="form">
        <div class="input-box">
        <input type="text" name="name" placeholder="Enter  Name" required/>
        </div>
        <button type="submit" value="Add Category" name="addCategory">Add</button>
      </form>
    </section>
              

