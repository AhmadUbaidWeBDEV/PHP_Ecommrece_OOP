<?php session_start(); ?>
<?php include './inc/database.php'; ?>
<?php include './inc/classes/cart.php'; ?>
<?php 
  $db = new Database();
  $categoryObj = $db->select("SELECT * FROM categories");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="./css/custom.css" rel="stylesheet">



<style>
/*Register code starts*/

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




/*Register code ends */
  
  /*Login Design Code Starts*/

  
.logincontainer{
  margin-top:50px;
  position: relative;
  max-width: 430px;
  width: 100%;
  background: #fff;
  margin-left: auto;
  margin-right: auto;
  border-radius: 10px;
  border: 1px solid black;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  overflow: hidden;

}

.logincontainer .login_forms{
  display: flex;
  align-items: center;
  height: 440px;

  max-width: 600px;
  transition: height 0.2s ease;
}
.logincontainer .forms{
  width: 50%;
  padding: 30px;
  background-color: #fff;
  transition: margin-left 0.18s ease;
}
.logincontainer.active .logins{
  margin-left: -50%;
  opacity: 0;
  transition: margin-left 0.18s ease, opacity 0.15s ease;
}
.logincontainer .signup{
  opacity: 0;
  transition: opacity 0.09s ease;
}
.logincontainer.active .signup{
  opacity: 1;
  transition: opacity 0.2s ease;
}

.logincontainer.active .login_forms{
  height: 600px;
}
.logincontainer .forms .title{
  position: relative;
  font-size: 27px;
  font-weight: 600;
}

.forms .title::before{
  content: '';
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 30px;
  background-color: #4070f4;
  border-radius: 25px;
}

.forms .input-field1{
  position: relative;
  height: 50px;
  width: 100%;
  margin-top: 30px;
}

.input-field1 input{
  position: absolute;
  height: 100%;
  width: 300px;
  padding: 0 35px;
  border: none;
  outline: none;
  font-size: 16px;
  border-bottom: 2px solid #ccc;
  border-top: 2px solid transparent;
  transition: all 0.2s ease;
}

.input-field1 input:is(:focus, :valid){
  border-bottom-color: #4070f4;
}

.input-field1 i{
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  color: #999;
  font-size: 23px;
  transition: all 0.2s ease;
}

.input-field1 input:is(:focus, :valid) ~ i{
  color: #4070f4;
}

.input-field1 i.icon{
  left: 0;
}
.input-field1 i.showHidePw{
  right: 0;
  cursor: pointer;
  padding: 10px;
}

.forms .checkbox-text{
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-top: 20px;
}

.checkbox-text .checkbox-content{
  display: flex;
  align-items: center;
}

.checkbox-content input{
  margin-right: 10px;
  accent-color: #4070f4;
}

.forms .text{
  color: #333;
  font-size: 14px;
}

.forms a.text{
  color: #4070f4;
  text-decoration: none;
}
.forms a:hover{
  text-decoration: underline;
}

.forms .button1{
  margin-top: 35px;
}

.forms .button1 input{
  border: none;
  margin-left: 40px;
  color: #fff;
  font-size: 17px;
  font-weight: 500;
  letter-spacing: 1px;
  border-radius: 6px;
  background-color: #4070f4;
  cursor: pointer;
  transition: all 0.3s ease;
}

.button1 input:hover{
  background-color: #265df2;
}

.forms .login-signup{
  margin-top: 30px;
  text-align: center;
}

 

  /*Login Design Code Ends*/







/* Product Shop code Starts here*/
.productsShop{
  margin-top: 80px;
  width: 100%;
  align-self: center;
  height: 50%;
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 40px;
}
.productShop{
  border: 1px solid black;
  margin-left: 10px;
  margin-right: 10px;
  background-color: var(--sectionBack);
  width: 350px;
  height:400px;
  box-shadow: 0 5px 20px rgba(0, 0, 0, .3);
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  padding: 20px 20px 40px;
  border-radius: 10px;
  transition: .3s;
}
.productShop:hover{
  transform: translateY(-15px);
  box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
}
.imageShop{
  width:100%;
  height: 60%;
  display: grid;
  place-content: center;
}
.imageShop img{
  max-width: 200px;
  height: 150px;
}
.namePriceShop{
  width: 100%;
  display: flex;
  justify-content: space-between;
}
.namePriceShop h3{
 text-align: center;
}
.namePriceShop a{
  font-size: 1.3em;
  text-transform: capitalize;
  color: black;
  text-decoration: none;
}
.namePriceShop span{
  font-size: 1.5em;
  color: green;
}
.productShop p{
  font-size: 18px;
  line-height: 25px;
}

.bayShop{

display: flex;
justify-content: space-between;
  margin-left: 10px;
}
.bayShopprod{
  padding: 10px 15px;
  border-radius: 7px;
  border: none;
  background-color: lightgray;
  color: black;
  font-size: 18px;
  text-transform: capitalize;
  cursor: pointer;
  transition: .5s;
  
}

.addtocart{
  padding: 10px 15px;
  border-radius: 7px;
  border: none;
  background-color:black;
  color: white;
  font-size: 18px;
  text-transform: capitalize;
  cursor: pointer;
  transition: .5s;
  
}








/* Add to cart code*/
.flex-boxCart{
    display: flex;
    max-width: 800px;
    margin: 20px auto;
}
.leftCart{
    width: 40%;
}
.big-imgCart{
    width: 250px;
    
}
.big-imgCart img{
    width: inherit;
    height: 300px;
    border: 1px solid black;
}
.imagesCart{
    display: flex;
    justify-content: space-between;
    width: 60%;
    margin-top: 15px;
}
.small-imgCart{
    width: 50px;
    overflow: hidden;
    border: 1.5px solid black;
}
.small-imgCart img{
    width: inherit;
    cursor: pointer;
    transition: all 0.3s ease;
}
.small-imgCart:hover img{
    transform: scale(1.2);
}
.urlCart{
    font-size: 16px;
    font-weight: 400;
    color: rgb(0, 102, 255);
}
.pnameCart{
    font-size: 22px;
    font-weight: 600;
    margin-top: 50px;
}
.ratings i{
    color: rgb(255, 136, 0);
}
.priceCart{
    font-size: 20px;
    font-weight: 500;
    margin: 20px 0;
}
.sizeCart{
    display: flex;
    align-items: center;
    margin: 20px 0;
}

.quantityCart{
    display: flex;
}
.quantityCart p{
    font-size: 18px;
    font-weight: 500;
}
.quantityCart input{
    width: 40px;
    font-size: 17px;
    font-weight: 500;
    text-align: center;
    margin-left: 15px;
}
.btn-boxCart{
    display: flex;
    margin-top: 40px;
}
.btn-boxCart button{
    font-size: 18px;
    padding: 8px 25px;
    border: none;
    outline: none;
    border-radius: 6px;
    cursor: pointer;
    color: white;
}

.addItemBtn{
    background-color: #00aeff;
}

.addItemBtn:hover{
    background-color: #0066ff;
}









/*   cart  design */




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
  #delBtn{
    margin-left:10px;
      border: none;
      padding: 7px 20px;
      border-radius: 8px;
      background-color:#FF1A03;
      color: #e6e7e8;
  }








  .navbar a:hover, .dropdown:hover .dropbtn { background-color: red;
  }
  
  /* Dropdown content (hidden by default) */
  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }
  
  /* Links inside the dropdown */
  .dropdown-content a {
    float: none;
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
  }
  
  /* Add a grey background color to dropdown links on hover */
  .dropdown-content a:hover {
    background-color: #ddd;
  }
  
  /* Show the dropdown menu on hover */
  .dropdown:hover .dropdown-content {
    display: block;
  }





















/* checkout */

.container01 {
  width: 100%;
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
  margin-top: 20px;
}
@media (min-width: 1200px) {
  .container01 {
    max-width: 1140px;
  }
}
.d-flex11 {
  display: flex;
  flex-direction: row;
  background: #f6f6f6;
  border-radius: 0 0 5px 5px;
  padding: 25px;
}
.formcheckout{
  flex: 4;
}
.Yorder {
  flex: 2;
}
.title01 {
  background: -webkit-gradient(
    linear,
    left top,
    right bottom,
    color-stop(0, #5195a8),
    color-stop(100, #70eaff)
  );
  background: -moz-linear-gradient(top left, #5195a8 0%, #70eaff 100%);
  background: -ms-linear-gradient(top left, #5195a8 0%, #70eaff 100%);
  background: -o-linear-gradient(top left, #5195a8 0%, #70eaff 100%);
  background: linear-gradient(to bottom right, #5195a8 0%, #70eaff 100%);
  border-radius: 5px 5px 0 0;
  padding: 20px;
  color: #f6f6f6;
}
.h12 {
  margin: 0;
  padding-left: 15px;
}
.required {
  color: red;
}
label,
.tblcheckout {
  display: block;
  margin: 15px;
}
.labelcheckout > #spancheckout {
  float: left;
  width: 25%;
  margin-top: 12px;
  padding-right: 10px;
}
.inputcheckout{
  width: 70%;
  height: 30px;
  padding: 5px 10px;
  margin-bottom: 10px;
  border: 1px solid #dadada;
  color: #888;
}

.Yorder {
  margin-top: 15px;
  height: 600px;
  padding: 20px;
  border: 1px solid #dadada;
}
.tblcheckout {
  margin: 0;
  padding: 0;
}
.thcheckout {
  border-bottom: 1px solid #dadada;
  padding: 10px 0;
}
.trcheckout > .tdcheckout:nth-child(1) {
  width: 200px;
  text-align: left;
  color: #2d2d2a;
}
.trcheckout > .tdcheckout:nth-child(2) {
  text-align: right;
  color: #52ad9c;
}
.tdcheckout {
  border-bottom: 1px solid #dadada;
  padding: 25px 25px 25px 0;
}
.price {
  border-bottom: 1px solid #dadada;
  padding: 25px 25px 25px 0;
}





.Yorder > div {
  padding: 15px 0;
}

.btncheckout {
  width: 200px;
  margin-top: 10px;
  padding: 10px;
  border: none;
  border-radius: 8px;
  background: #52ad9c;
  color: #fff;
  font-size: 15px;
  font-weight: bold;
}
.btncheckout:hover {
  cursor: pointer;
  background: #428a7d;
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


/* header tabs account */
.tabset > input[type="radio"] {
  position: absolute;
  left: -200vw;
}

.tabset .tab-panel {
  display: none;
}

.tabset > input:first-child:checked ~ .tab-panels > .tab-panel:first-child,
.tabset > input:nth-child(3):checked ~ .tab-panels > .tab-panel:nth-child(2),
.tabset > input:nth-child(5):checked ~ .tab-panels > .tab-panel:nth-child(3),
.tabset > input:nth-child(7):checked ~ .tab-panels > .tab-panel:nth-child(4),
.tabset > input:nth-child(9):checked ~ .tab-panels > .tab-panel:nth-child(5),
.tabset > input:nth-child(11):checked ~ .tab-panels > .tab-panel:nth-child(6) {
  display: block;
}

/*
 Styling
*/

.tabset > .lbl717 {
  position: relative;
  display: inline-block;
  padding: 15px 15px 25px;
  border: 1px solid transparent;
  border-bottom: 0;
  cursor: pointer;
  font-weight: 600;
}

.tabset > .lbl717::after {
  content: "";
  position: absolute;
  left: 15px;
  bottom: 10px;
  width: 22px;
  height: 4px;
  background: #8d8d8d;
}

.tabset >.lbl717:hover,
.tabset > input:focus + .lbl717 {
  color: #06c;
}

.tabset > .lbl717:hover::after,
.tabset > input:focus + .lbl717::after,
.tabset > input:checked + .lbl717::after {
  background: #06c;
}

.tabset > input:checked + .lbl717 {
  border-color: #ccc;
  border-bottom: 1px solid #fff;
  margin-bottom: -1px;
}

.tab-panel {
  padding: 30px 0;
  border-top: 1px solid #ccc;
}


.tabset {
  max-width: 65em;
}




</style>




</head>

<body>


<div class="navbar">
  <a style="padding-left: 80px;" href="/dashboard/Ecom_Storee/index.php">Ecommerce Store</a>


  <div style="display: flex;justify-content:end; padding-right:90px; ">
  <a href="/dashboard/Ecom_Storee/index.php">Home</a>
  <div class="dropdown">


  
    <button class="dropbtn">Categories
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
    <?php while($categories = $categoryObj->fetch_assoc()){ ?>
              <a  href="category.php?id=<?php echo $categories['cid']; ?>"><?php echo $categories['name']; ?></a>
    <?php } ?>
    
    </div>


  </div>
  <a href="cart.php"><i style="font-size: 25px;" class="fa fa-shopping-cart" aria-hidden="true"></i></a>
  
    
    <?php if(isset($_SESSION['username'])){ ?> 
    <div>
    <div class="dropdown">
    <button  style="font-size: 16px;border: none;  outline: none; color: white;  padding: 14px 16px; background-color: inherit; font-family: inherit;   margin: 0; " class="dropbtn"><?php echo $_SESSION['username']; ?>  <i class="fa fa-caret-down"></i></button>
    
    <div class="dropdown-content">
    <a href="./myaccount.php">My Account</a> 
     <?php if($_SESSION['userrole']=="admin"){?>
      <a href="./admin/index.php">Admin view</a>    
    <?php } ?>
    <a href="logout.php">Logout</a>    
    </div>
       
        </div>
    </div>
    <?php }else{ ?>
        <a href="login.php">Login</a>
        <a href="register.php">Sign Up</a>
        <?php }?>



        </div>
</div>



