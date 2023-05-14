<?php include 'header.php'; ?>
<section class="container">
      <h1>Add User</h1>
      <form action="customer.php" method="POST"  enctype="multipart/form-data" class="form">
        <div class="input-box">
        <input type="text" name="name" placeholder="Enter  Name" required/>
        </div>
        <div class="input-box">
        <input type="text" name="phone" placeholder="Enter phone Number" required />
        </div>
 
  <div class="input-box">
  <input type="text" name="email" placeholder="Enter Email" required />
  </div>     
  <div class="select-box">
  <select name="User_Role">
  <option hidden>Select USER Role</option>
  <option>admin</option>
  <option>costumer</option>
  </select>
  </div>
  <div class="input-box">
  <input type="text" name="password" placeholder="Enter Password" required />
  </div>
        <button type="submit" value="addcustomer" name="addcustomer">Add</button>
      </form>
    </section>
              