<?php include 'header.php'; ?>
<?php 
    $db = new Database();
    //Product Information
    $userId = $_GET['user_id'];
    $result = $db->select("SELECT * FROM users WHERE id = '$userId' ");
    $user = $result->fetch_assoc();

?>

<section class="container">
      <h1>Edit User</h1>
      <form action="customer.php" method="POST"  enctype="multipart/form-data" class="form">
        <div class="input-box">
        <input type="text" name="name" placeholder="Enter  Name"  value="<?php echo $user['name']; ?>"/>
        <input type="hidden" name="uid" value="<?php echo $user['id']; ?>">
        </div>
        <div class="input-box">
        <input type="text" name="phone" placeholder="Enter phone Number" value="<?php echo $user['phone']; ?>">
        </div>
 
  <div class="input-box">
  <input type="text" name="email" placeholder="Enter Email" value="<?php echo $user['email']; ?>" />
  </div>     
  <div class="select-box">
  <select name="User_Role">
  <option><?php echo $user['User_Role']; ?></option>
  <option>admin</option>
  <option>costumer</option>
  </select>
  </div>
  <div class="input-box">
  <input type="text" name="password" placeholder="Enter Password" value="<?php echo $user['password']; ?>">
  </div>
        <button type="submit" value="editcustomer" name="editcustomer">Update</button>
      </form>
    </section>
              