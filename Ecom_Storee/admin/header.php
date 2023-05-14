<?php include './../inc/database.php' ?>
<?php 
 session_start();
?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style> 
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
*{
  margin: 0;
  padding: 0;
  text-decoration: none;
  font-family: "Poppins", sans-serif;
}
.sidebar{
  position: fixed;
  width: 240px;
  left: -240px;
  height: 100%;
  background: #1e1e1e;
  transition: all .5s ease;
}
.sidebar header{
  font-size: 28px;
  color: white;
  line-height: 70px;
  text-align: center;
  background: #1b1b1b;
  user-select: none;
  font-family: 'Montserrat', sans-serif;
}
.sidebar a{
  display: block;
  height: 65px;
  width: 100%;
  color: white;
  line-height: 65px;
  padding-left: 30px;
  box-sizing: border-box;
  border-bottom: 1px solid black;
  border-top: 1px solid rgba(255,255,255,.1);
  border-left: 5px solid transparent;
  font-family: 'Open Sans', sans-serif;
  transition: all .5s ease;
}

.sidebar a i{
  font-size: 23px;
  margin-right: 16px;
}
.sidebar a span{
  letter-spacing: 1px;
  text-transform: uppercase;
}
#check{
  display: none;
}
label #btn,label #cancel{
  position: absolute;
  cursor: pointer;
  color: white;
  border-radius: 5px;
  border: none;
  left:5px;
  font-size: 29px;
  background: rgb(130, 106, 251);
  height: 45px;
  width: 45px;
  top:5px;

  text-align: center;
  line-height: 45px;
  transition: all .5s ease;
}
label #cancel{
  opacity: 0;
  visibility: hidden;
}
#check:checked ~ .sidebar{
  left: 0;
}
#check:checked ~ label #btn{
  margin-left: 245px;
  opacity: 0;
  visibility: hidden;
}
#check:checked ~ label #cancel{
  margin-left: 245px;
  opacity: 1;
  visibility: visible;
}
@media(max-width : 860px){
  .sidebar{
    height: auto;
    width: 70px;
    left: 0;
    margin: 100px 0;
  }
  header,#btn,#cancel{
    display: none;
  }
  span{
    position: absolute;
    margin-left: 23px;
    opacity: 0;
    visibility: hidden;
  }
  .sidebar a{
    height: 60px;
  }
  .sidebar a i{
    margin-left: -10px;
  }
  

}



/*  form*/

.container {
margin-left:auto;
margin-right:auto;
margin-top:5px;
  position: relative;
  max-width: 700px;

 border:1px solid black;
  background: #fff;
  padding: 25px;
  border-radius: 8px;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
}
.container h1 {
  font-size: 1.5rem;
  color: #333;
  font-weight: 500;
  text-align: center;
}
.container .form {
  margin-top: 30px;
}
.form .input-box {
  max-width: 650px;
  
  margin-right: 20px;

}
.input-box label {
  color: #333;
}
.form :where(.input-box input, .select-box) {
  position: relative;
  height: 50px;
  width: 650px;
 margin-right: 10px;
  margin-top: 20px;
  outline: none;
  font-size: 1rem;
  color: #707070;
  ;
  border: 1px solid #ddd;
  border-radius: 6px;
  padding: 0 15px;
}
.input-box input:focus {
  box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
}
.form .column {
  display: flex;
  column-gap: 15px;
}
.form .gender-box {
  margin-top: 20px;
}
.gender-box h3 {
  color: #333;
  font-size: 1rem;
  font-weight: 400;
  margin-bottom: 8px;
}
.form :where(.gender-option, .gender) {
  display: flex;
  align-items: center;
  column-gap: 50px;
  flex-wrap: wrap;
}
.form .gender {
  column-gap: 5px;
}
.gender input {
  accent-color: rgb(130, 106, 251);
}
.form :where(.gender input, .gender label) {
  cursor: pointer;
}
.gender label {
  color: #707070;
}
.address :where(input, .select-box) {
  margin-top: 15px;
}
.select-box select {
  height: 100%;
  width: 100%;
  outline: none;
  border: none;
  color: #707070;
  font-size: 1rem;
}
.form button {
  height: 55px;
  width:12rem ;
  color: #fff;
  font-size: 1rem;
  font-weight: 400;
  margin-top: 30px;
margin-left:auto;
margin-right:auto;
  border: none;
border-radius:5px;
  cursor: pointer;
  transition: all 0.2s ease;
  background: rgb(130, 106, 251);
}
.form button:hover {
  background: rgb(88, 56, 250);
}
/*Responsive*/
@media screen and (max-width: 500px) {
  .form .column {
    flex-wrap: wrap;
  }
  .form :where(.gender-option, .gender) {
    row-gap: 15px;
  }
}









#btnlft{

  height: 55px;
  width:12rem ;
  color: #fff;
  font-size: 1rem;
  font-weight: 400;
position: relative;
left: 75%;
  border: none;
border-radius:5px;
  cursor: pointer;
  transition: all 0.2s ease;
  background: green;
}



.button{
  position: relative;
  height: 40px;
  width: 120px;
  margin-top: 5px;
  
  border: none;
  outline: none;
  color: white;
  background: #111;
  cursor: pointer;
  border-radius: 5px;
  font-size: 18px;
  font-family: 'Raleway', sans-serif;
}
.button:before{
  position: absolute;
  content: '';
  top: -2px;
  left: -2px;
  height: calc(100% + 4px);
  width: calc(100% + 4px);
  border-radius: 5px;
  z-index: -1;
  opacity: 0;
  filter: blur(5px);
  background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
  background-size: 400%;
  transition: opacity .3s ease-in-out;
  animation: animate 20s linear infinite;
}









.tbl {
  
margin-top:50px;
margin-left:auto;
margin-right:auto;
border: 1px solid black;
    width: 80%;
    border-collapse: collapse;
}

.header_fixed {
  border-top-right-radius: 18px;
border-top-left-radius: 18px;
    max-height: 100vh;
border: none;
    width: 100%;
    overflow: auto;
    
}

.header_fixed thead th {
  background: rgb(130, 106, 251);

    color: #e6e7e8;
    font-size: 15px;
}

.tbl th,td {
text-align:center;
    border-bottom: 1px solid #dddddd;
    padding: 10px 20px;
    font-size: 14px;
}

.tbl td img {
    height: 100px;
    width: 120px;
    border-radius: 5px;
    border: 2px solid #e6e7e8;
}
.tbl tr {
    
    background-color: #ffffff;
}

.tbl td p{
margin-top:10px;
font-size:20px;
}


#edtbtn{
  margin-left:10px;
    border: none;
    padding: 7px 20px;
    border-radius: 8px;
    background-color: #1388D5;
    color: #e6e7e8;
}
#delbtn{margin-left:10px;border: none;padding: 7px 20px;border-radius: 8px;background-color:#FF1A03;color: #e6e7e8;
}
::-webkit-scrollbar {
    width: 6px;
}

::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
}

::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);

}



/*order item details */

.container888 {
  max-width: 980px;
  margin: 0 auto;
}
.logotype777 {
  background: #000;
  color: #fff;
  width: 75px;
  height: 75px;
  line-height: 75px;
  text-align: center;
  font-size: 11px;
}
.column-title777 {
  background: #eee;
  text-transform: uppercase;
  padding: 15px 5px 15px 15px;
  font-size: 11px;
}

.column-header777 {
  background: #eee;
  text-transform: uppercase;
  padding: 15px;
  font-size: 16px;
  border-right: 1px solid #eee;
}
.row777 {
  padding: 7px 14px;
  border-left: 1px solid #eee;
  border-right: 1px solid #eee;
  border-bottom: 1px solid #eee;
}

</style>
  
  </head>
  <body>
    <input type="checkbox" id="check">
    <label for="check">
      <i class="fas fa-bars" id="btn"></i>
      <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
      <header>Admin Menu</header>
      <a href="index.php" class="active">
        <i class="fas fa-qrcode"></i>
        <span>Dashboard</span>
      </a>
      <a href="categories.php">
        <i class="fas fa-store"></i>
        <span>Catagories</span>
      </a>
      <a href="products.php">
      <i class="fa fa-gift"></i>
        <span>Produts</span>
      </a>
      <a href="./customer.php">
        <i class="fa fa-users"></i>
        <span>Customers</span>
      </a>
      <a href="./order.php">
        <i class="fas fa-shopping-bag"></i>
        <span>Orders</span>
      </a>
      
      <a href="http://localhost/dashboard/Ecom_Storee/index.php">
        <i class="fas fa-shopping-cart"></i>
        <span>Shop view</span>
      </a>
      <a href="./../logout.php">
        <i class="fa fa-sign-out"></i>
        <span>Logout</span>
      </a>
    </div>
</body>
</html>




